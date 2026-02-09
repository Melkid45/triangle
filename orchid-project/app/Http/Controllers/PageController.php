<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Career;
use App\Models\CareerBLock;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Facts;
use App\Models\Faq;
use App\Models\Hero;
use App\Models\Partners;
use App\Models\Preview;
use App\Models\Slogan;
use App\Models\Ways;
use App\Models\WorkBLock;
use App\Models\Works;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function Home(Request $request)
    {
        $hero = Hero::first();
        $ways = Ways::first();
        $preview = Preview::first();
        $facts = Facts::first();
        $seoData = $hero ? $hero->getSeoData() : null;
        return view('app.home', compact('hero', 'ways', 'preview', 'facts', 'seoData'));
    }
    function About(Request $request)
    {
        $about = About::first();
        $slogan = Slogan::first();
        $partners = Partners::first();
        $seoData = $about ? $about->getSeoData() : null;
        return view('app.about', compact('about', 'slogan', 'seoData', 'partners'));
    }
    function Faq(Request $request)
    {
        $faq = Faq::first();
        $seoData = $faq ? $faq->getSeoData() : null;
        return view('app.faq', compact('faq', 'seoData'));
    }
    function Career(Request $request)
    {
        $career = Career::all()->filter(function ($job) {
            if (!$job->date) {
                return true;
            }

            try {
                $deadline = \Carbon\Carbon::parse($job->date);
                return $deadline->isFuture() || $deadline->isToday();
            } catch (\Exception $e) {
                return true;
            }
        });

        $careerBlock = CareerBLock::first();
        $seoData = $careerBlock ? $careerBlock->getSeoData() : null;
        return view('app.career', compact('career', 'careerBlock', 'seoData'));
    }
    public function careerDetails($slug)
    {
        $id = last(explode('-', $slug));
        $job = Career::find($id);

        if (!$job) {
            abort(404);
        }
        $seoData = $job ? $job->getSeoData() : null;
        return view('app.career-details', compact('job', 'seoData'));
    }
    public function careerForm($slug)
    {
        $id = last(explode('-', $slug));
        $job = Career::find($id);

        if (!$job) {
            abort(404);
        }
        $seoData = $job ? $job->getSeoData() : null;
        return view('app.job-form', compact('job', 'seoData'));
    }
    public function Works(Request $request)
    {
        $works = Works::all();
        $worksBlock = WorkBLock::first();
        $categories = Categories::all();

        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category->id] = $category->name;
        }
        $seoData = $worksBlock ? $worksBlock->getSeoData() : null;
        return view('app.works', compact('categories', 'works', 'categoryMap', 'seoData'));
    }
    public function Contact(Request $request){
        $contact = Contact::first();
        $seoData = $contact ? $contact->getSeoData() : null;
        return view('app.contact', compact('seoData'));
    }
}
