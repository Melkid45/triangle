<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class SeoLayout extends Rows
{
    public function fields(): array
    {
        return [
            TextArea::make('seo.meta_description')
                ->title('Meta Description')
                ->placeholder('Type meta description')
                ->rows(3)
                ->max(160),

            Input::make('seo.meta_keywords')
                ->title('Meta Keywords')
                ->placeholder('Write keywords'),

            TextArea::make('seo.og_description')
                ->title('Open Graph Description')
                ->placeholder('OG Description')
                ->rows(3),

            Upload::make('seo.og_image')
                ->title('Open Graph Image')
                ->acceptedFiles('image/*')
                ->maxFiles(1),

            TextArea::make('seo.twitter_description')
                ->title('Twitter Description')
                ->placeholder('Description for Twitter')
                ->rows(3)
        ];
    }
}