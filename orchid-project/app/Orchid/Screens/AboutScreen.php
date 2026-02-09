<?php

namespace App\Orchid\Screens;

use App\Models\About;
use App\Models\Partners;
use App\Models\SeoData;
use App\Models\Slogan;
use App\Orchid\Layouts\SeoLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class AboutScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $about = About::firstOrNew([]);
        $partners = Partners::firstOrNew([]);
        $slogan = Slogan::firstOrNew([]);
        return [
            'about' => $about,
            'partners' => $partners,
            'slogan' => $slogan,
            'seo' => $about ? $about->getSeoData() : null
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit About';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save')
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('about.title')
                    ->title('Title')
                    ->placeholder('title'),
                Upload::make('about.images')
                    ->title('Images')
                    ->maxFiles(6),
            ])->title('About block'),
            Layout::rows([
                TextArea::make('slogan.description')
                ->title('Description')
                ->rows(5),
                Matrix::make('slogan.items')
                ->columns([
                    'Photo' => 'photo',
                    'Title' => 'title',
                    'Description' => 'description'
                ])
                ->fields([
                    'photo' => Upload::make()->maxFiles(1),
                    'title' => Input::make()->placeholder('Title'),
                    'description' => TextArea::make()
                ])
            ])->title('Slogan block'),
            Layout::rows([
                Upload::make('partners.partner')
                ->title('Partner Logo')
            ])->title('Partners block'),
            'SEO' => new SeoLayout(),
        ];
    }
    function save(Request $request)
    {
        $request->validate([
            'about.title' => 'string|required',
            'about.images' => 'array'
        ]);
        // About
        $about = About::firstOrCreate([]);
        $about->fill($request->get('about'))->save();
        // Partners
        $partners = Partners::firstOrNew([]);
        $partners->fill($request->get('partners'))->save();
        // Slogan
        $slogan = Slogan::firstOrCreate([]);
        $slogan->fill($request->get('slogan'))->save();
        // Seo

        if ($about->seo) {
            $about->seo->update($request->input('seo', []));
        } else {
            $seoData = array_merge(
                ['page_type' => About::class, 'page_id' => $about->id],
                $request->input('seo', [])
            );
            SeoData::create($seoData);
        }
        Toast::success('About page succesfuly save!');
        return redirect()->route('platform.about');
    }
}
