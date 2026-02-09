<?php

namespace App\Services;

use App\Models\About;
use App\Models\Contact;
use App\Models\Hero;
use App\Models\SeoData;
use App\Models\Services;
use App\Models\WorksContent;
use App\Models\ServicesContent;
use App\Models\Work;
use App\Models\WorkBLock;
use App\Models\Works;
use Illuminate\Support\Facades\Log;

class SeoService
{
    public function getSeoForCurrentPage()
    {
        $route = request()->route();
        $routeName = $route ? $route->getName() : null;
        $path = request()->path();
        $uri = request()->getRequestUri();

        Log::debug('SEO Service Detailed Debug', [
            'route_name' => $routeName,
            'path' => $path,
            'uri' => $uri,
            'full_url' => request()->fullUrl()
        ]);

        if ($this->isWorksPage($routeName, $path, $uri)) {
            return $this->getWorksSeo();
        }
        if ($this->isWorksShowPage($routeName, $path, $uri)) {
            return $this->getWorksShowSeo();
        }
        if ($this->isContactPage($routeName, $path, $uri)) {
            return $this->getContactSeo();
        }
        if ($this->isAboutPage($routeName, $path, $uri)) {
            return $this->getAboutSeo();
        }
        if ($this->isHomePage($routeName, $path, $uri)) {
            return $this->getHomeSeo();
        }

        return $this->getDefaultSeo();
    }

    protected function isWorksPage($routeName, $path, $uri): bool
    {
        $worksPatterns = [
            'works',
            '/works',
            'works/',
            '/works/',
        ];

        foreach ($worksPatterns as $pattern) {
            if (
                strpos($uri, $pattern) !== false ||
                strpos($path, $pattern) !== false ||
                $routeName === 'works' ||
                $routeName === 'platform.works.content'
            ) {
                Log::debug('SEO Service: Matched works page', ['pattern' => $pattern]);
                return true;
            }
        }

        return false;
    }
    protected function isWorksShowPage($routeName, $path, $uri): bool
    {
        $worksPatterns = [
            'works',
            '/works',
            'works/',
            '/works/',
        ];

        foreach ($worksPatterns as $pattern) {
            if (
                strpos($uri, $pattern) !== false ||
                strpos($path, $pattern) !== false ||
                $routeName === 'works' ||
                $routeName === 'works.content'
            ) {
                Log::debug('SEO Service: Matched works page', ['pattern' => $pattern]);
                return true;
            }
        }

        return false;
    }
    protected function isContactPage($routeName, $path, $uri): bool
    {
        $contactPatterns = [
            'contact',
            '/contact',
            'contact/',
            '/contact/',
        ];

        foreach ($contactPatterns as $pattern) {
            if (
                strpos($uri, $pattern) !== false ||
                strpos($path, $pattern) !== false ||
                $routeName === 'contact' ||
                $routeName === 'contact.show' ||
                $routeName === 'platform.contact'
            ) {
                Log::debug('SEO Service: Matched contact page', ['pattern' => $pattern]);
                return true;
            }
        }

        return false;
    }
    protected function isAboutPage($routeName, $path, $uri): bool
    {
        $contactPatterns = [
            'about',
            '/about',
            'about/',
            '/about/',
        ];

        foreach ($contactPatterns as $pattern) {
            if (
                strpos($uri, $pattern) !== false ||
                strpos($path, $pattern) !== false ||
                $routeName === 'about' ||
                $routeName === 'about.show' ||
                $routeName === 'platform.about'
            ) {
                Log::debug('SEO Service: Matched about page', ['pattern' => $pattern]);
                return true;
            }
        }

        return false;
    }
    protected function isServicesPage($routeName, $path, $uri): bool
    {
        $servicesPatterns = [
            'services',
            '/services',
            'services/',
            '/services/',
        ];

        foreach ($servicesPatterns as $pattern) {
            if (
                strpos($uri, $pattern) !== false ||
                strpos($path, $pattern) !== false ||
                $routeName === 'services'
            ) {
                Log::debug('SEO Service: Matched services page', ['pattern' => $pattern]);
                return true;
            }
        }

        return false;
    }
    protected function isServicesShowPage($routeName, $path, $uri): bool
    {
        $servicesPatterns = [
            'services',
            '/services',
            'services/',
            '/services/',
        ];

        foreach ($servicesPatterns as $pattern) {
            if (
                strpos($uri, $pattern) !== false ||
                strpos($path, $pattern) !== false ||
                $routeName === 'services' ||
                $routeName === 'services.show'
            ) {
                Log::debug('SEO Service: Matched services page', ['pattern' => $pattern]);
                return true;
            }
        }

        return false;
    }

    protected function isHomePage($routeName, $path, $uri): bool
    {
        $isHome = $path === '/' ||
            $path === '' ||
            $path === 'home' ||
            $uri === '/' ||
            $routeName === 'home' ||
            $routeName === 'platform.home';

        if ($isHome) {
            Log::debug('SEO Service: Matched home page');
        }

        return $isHome;
    }

    protected function getWorksSeo()
    {

        try {
            $works = WorkBLock::with('seo')->first();

            if (!$works) {
                return $this->getDefaultSeo();
            }


            $seoData = $works->getSeoData();

            if (!$seoData) {
                return $this->getDefaultSeo();
            }

            return $seoData;
        } catch (\Exception $e) {
            Log::error('SEO Service: Error getting works SEO: ' . $e->getMessage());
            return $this->getDefaultSeo();
        }
    }
    protected function getWorksShowSeo()
    {
        try {
            $workId = request()->segment(2);

            if ($workId && is_numeric($workId)) {
                $work = Works::with('seo')->find($workId);

                if ($work) {
                    return $work->getSeoData();
                }
            }

            return $this->getDefaultSeo();
        } catch (\Exception $e) {
            Log::error('SEO Service: Error getting work show SEO: ' . $e->getMessage());
            return $this->getDefaultSeo();
        }
    }



    protected function getHomeSeo()
    {
        try {
            $hero = Hero::first();
            return $hero ? $hero->getSeoData() : $this->getDefaultSeo();
        } catch (\Exception $e) {
            Log::error('SEO Service: Error getting home SEO: ' . $e->getMessage());
            return $this->getDefaultSeo();
        }
    }
    protected function getContactSeo()
    {
        try {
            $contact = Contact::first();
            return $contact ? $contact->getSeoData() : $this->getDefaultSeo();
        } catch (\Exception $e) {
            Log::error('SEO Service: Error getting home SEO: ' . $e->getMessage());
            return $this->getDefaultSeo();
        }
    }
    protected function getAboutSeo()
    {
        try {
            $about = About::first();
            return $about ? $about->getSeoData() : $this->getDefaultSeo();
        } catch (\Exception $e) {
            Log::error('SEO Service: Error getting home SEO: ' . $e->getMessage());
            return $this->getDefaultSeo();
        }
    }

    protected function getDefaultSeo()
    {
        Log::debug('SEO Service: Using default SEO');

        return (object) [
            'meta_description' => 'Default description - change in SeoService',
            'meta_keywords' => 'default,keywords',
            'og_description' => 'Default OG description',
            'og_image' => '/images/default-preview.jpg',
            'twitter_description' => 'Default Twitter description',
        ];
    }
}
