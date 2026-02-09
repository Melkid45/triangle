<?php

namespace App\Orchid\Screens;

use App\Models\Facts;
use App\Models\Hero;
use App\Models\Preview;
use App\Models\Ways;
use App\Models\Works;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class HeroScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $hero = Hero::firstOrNew([]);
        $ways = Ways::firstOrNew([]);
        $facts = Facts::firstOrCreate([]);
        $preview = Preview::firstOrCreate([]);
        return [
            'hero' => $hero,
            'ways' => $ways,
            'facts' => $facts,
            'preview' => $preview
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Home page';
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
        $works = Works::all()->pluck('name', 'id')->toArray();
        return [
            Layout::rows([
                Input::make('hero.title')
                    ->title('Hero title')
                    ->placeholder('title'),
                TextArea::make('hero.soft_title')
                    ->title('Soft title')
                    ->placeholder('soft title'),
                TextArea::make('hero.description')
                    ->title('Description')
                    ->placeholder('description')
                    ->rows(5)
            ])->title('Hero block'),
            Layout::rows([
                Matrix::make('ways.items')
                    ->title('Ways Items')
                    ->columns([
                        'Years' => 'years',
                        'Way' => 'way',
                        'Description' => 'description'
                    ])
                    ->fields([
                        'years' => Input::make(),
                        'way' => Input::make(),
                        'description' => TextArea::make()->rows(5)
                    ])
            ])->title('Ways block'),
            Layout::rows([
                Group::make([
                    Select::make('preview.column1')
                        ->options($works)
                        ->empty('Select work...')
                        ->multiple()
                        ->title('First column'),
                    Select::make('preview.column2')
                        ->options($works)
                        ->empty('Select work...')
                        ->multiple()
                        ->title('Second column'),
                    Select::make('preview.column3')
                        ->options($works)
                        ->empty('Select work...')
                        ->multiple()
                        ->title('Third column'),
                ])->fullWidth()
            ])->title('Preview Works'),
            Layout::rows([
                Input::make('facts.title')
                    ->title('Title')
                    ->placeholder('title'),
                Input::make('facts.soft_title')
                    ->title('Soft title')
                    ->placeholder('soft title'),
                TextArea::make('facts.description')
                    ->title('Description')
                    ->placeholder('description')
                    ->rows(5),
                Matrix::make('facts.items')
                    ->title('Facts Items')
                    ->columns([
                        'Point' => 'point',
                        'Title' => 'title',
                        'Soft' => 'soft'
                    ])
                    ->fields([
                        'point' => Input::make(),
                        'title' => Input::make(),
                        'soft' => Input::make()->rows(5)
                    ])
            ])->title('Facts block')
        ];
    }
    function save(Request $request)
    {
        $request->validate([
            'hero.title' => 'string|required|max:255',
            'hero.soft_title' => 'required|string',
        ]);
        // Hero
        $hero = Hero::firstOrNew([]);
        $hero->fill($request->get('hero'));
        $hero->save();
        // Ways
        $ways = Ways::firstOrCreate([]);
        $ways->items = $request->input('ways.items', []);
        $ways->save();
        // Facts
        $facts = Facts::firstOrCreate([]);
        $facts->fill($request->get('facts'))->save();
         // Preview
        $preview = Preview::firstOrCreate([]);
        $preview->fill($request->get('preview'));
        $preview->save();
        Toast::success('Home succesfuly save!');
        return redirect()->route('platform.hero');
    }
}
