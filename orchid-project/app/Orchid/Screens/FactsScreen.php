<?php

namespace App\Orchid\Screens;

use App\Models\Facts;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FactsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $facts = Facts::firstOrCreate([]);
        return [
            'facts' => $facts
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Facts';
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
            ])
        ];
    }

    function save(Request $request)
    {
        $facts = Facts::firstOrCreate([]);
        $facts->fill($request->get('facts'))->save();

        Toast::success('Facts succesfuly save!');
        return redirect()->route('platform.facts');
    }
}
