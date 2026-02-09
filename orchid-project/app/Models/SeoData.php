<?php
// app/Models/SeoData.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;

class SeoData extends Model
{
    use HasFactory, Attachable, Filterable;

    protected $fillable = [
        'page_type',
        'page_id',
        'meta_description',
        'meta_keywords',
        'og_description',
        'og_image',
        'twitter_description',
    ];

    protected $casts = [
        'og_image' => 'array',
    ];

    public function page()
    {
        return $this->morphTo('page', 'page_type', 'page_id');
    }

    public static function getForPage($pageType, $pageId = null)
    {
        return static::firstOrCreate([
            'page_type' => $pageType,
            'page_id' => $pageId
        ]);
    }

    public function setOgImageAttribute($value)
    {
        if (is_array($value)) {
            $value = array_filter($value, fn($v) => $v && $v !== 'undefined');
            $this->attributes['og_image'] = json_encode(array_values($value));
        } elseif ($value === null) {
            $this->attributes['og_image'] = json_encode([]);
        } else {
            $this->attributes['og_image'] = json_encode([$value]);
        }
    }
    public function getOgImageUrlAttribute()
    {
        if (is_array($this->og_image)) {
            $ids = array_filter($this->og_image, fn($v) => $v && $v !== 'undefined');
            if (!empty($ids)) {
                $attachment = \Orchid\Attachment\Models\Attachment::find($ids[0]);
                return $attachment ? $attachment->url() : null;
            }
        }

        if (is_string($this->og_image) && $this->og_image) {
            return asset($this->og_image);
        }

        return asset('/images/default-preview.jpg');
    }
}
