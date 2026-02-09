<?php
// app/Models/Concerns/HasSeoData.php

namespace App\Models\Concerns;

use App\Models\SeoData;
use Illuminate\Support\Facades\Log;

trait HasSeoData
{
    public function seo()
    {
        return $this->morphOne(SeoData::class, 'page', 'page_type', 'page_id');
    }

    public function getSeoData()
    {
        Log::debug('HasSeoData Debug', [
            'model_class' => static::class,
            'model_id' => $this->id,
            'seo_relation_loaded' => $this->relationLoaded('seo'),
            'seo_exists' => isset($this->seo)
        ]);

        if ($this->relationLoaded('seo') && $this->seo) {
            Log::debug('Using loaded SEO relation');
            return $this->seo;
        }

        $seoData = $this->seo()->first();
        
        if (!$seoData) {
            $seoData = $this->createDefaultSeoData();
        }


        return $seoData;
    }

    protected function createDefaultSeoData()
    {
        return SeoData::create([
            'page_type' => static::class,
            'page_id' => $this->id,
            'meta_description' => $this->getDefaultDescription(),
            'meta_keywords' => $this->getDefaultKeywords(),
            'og_description' => $this->getDefaultDescription(),
            'twitter_description' => $this->getDefaultDescription(),
        ]);
    }

    protected function getDefaultDescription()
    {
        return $this->description ?? $this->title ?? 'Default description for ' . static::class;
    }

    protected function getDefaultKeywords()
    {
        return 'default,keywords';
    }
}