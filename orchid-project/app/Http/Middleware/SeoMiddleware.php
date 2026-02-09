<?php
// app/Http/Middleware/SeoMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\SeoService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SeoMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        
        try {
            $seoService = app(SeoService::class);
            $seoData = $seoService->getSeoForCurrentPage();
            
            view()->share('seo', $seoData ?? $this->getFallbackSeo());
            
        } catch (\Exception $e) {
            view()->share('seo', $this->getFallbackSeo());
        }
        
        
        return $next($request);
    }

    protected function getFallbackSeo()
    {
        return (object) [
            'meta_description' => 'Fallback description',
            'meta_keywords' => 'fallback,keywords',
            'og_description' => 'Fallback OG description',
            'og_image' => '/images/default-preview.jpg',
            'twitter_description' => 'Fallback Twitter description',
        ];
    }
}