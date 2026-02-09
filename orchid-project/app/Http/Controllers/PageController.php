<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Career;
use App\Models\CareerBLock;
use App\Models\Categories;
use App\Models\Facts;
use App\Models\Faq;
use App\Models\Hero;
use App\Models\Preview;
use App\Models\Slogan;
use App\Models\Ways;
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
        return view('app.home', compact('hero', 'ways', 'preview', 'facts'));
    }
    function About(Request $request)
    {
        $about = About::first();
        $slogan = Slogan::first();
        return view('app.about', compact('about', 'slogan'));
    }
    function Faq(Request $request)
    {
        $faq = Faq::first();
        return view('app.faq', compact('faq'));
    }
    function Career(Request $request)
    {
        $career = Career::all()->filter(function ($job) {
            if (!$job->date) {
                return true;
            }

            try {
                // Преобразуем строку в Carbon
                $deadline = \Carbon\Carbon::parse($job->date);
                return $deadline->isFuture() || $deadline->isToday();
            } catch (\Exception $e) {
                return true;
            }
        });

        $careerBlock = CareerBLock::first();
        return view('app.career', compact('career', 'careerBlock'));
    }
    public function careerDetails($slug)
    {
        $id = last(explode('-', $slug));
        $job = Career::find($id);

        if (!$job) {
            abort(404);
        }

        return view('app.career-details', compact('job'));
    }
    public function careerForm($slug)
    {
        $id = last(explode('-', $slug));
        $job = Career::find($id);

        if (!$job) {
            abort(404);
        }

        return view('app.job-form', compact('job'));
    }
    public function Works(Request $request)
    {
        $works = Works::all();

        $categories = Categories::all();

        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category->id] = $category->name;
        }

        return view('app.works', compact('categories', 'works', 'categoryMap'));
    }
}
