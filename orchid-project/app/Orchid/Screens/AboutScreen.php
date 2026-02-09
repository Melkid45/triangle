<?php

namespace App\Orchid\Screens;

use App\Models\About;
use App\Models\Partners;
use App\Models\Slogan;
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
            'slogan' => $slogan
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
            ])->title('Partners block')
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
        Toast::success('About page succesfuly save!');
        return redirect()->route('platform.about');
    }
}
