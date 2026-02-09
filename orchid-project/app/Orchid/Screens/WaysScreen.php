<?php

namespace App\Orchid\Screens;

use App\Models\Ways;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class WaysScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $ways = Ways::firstOrNew([]);
        return [
            'ways' => $ways
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Ways';
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
            ])
        ];
    }
    function save(Request $request)
    {
        $ways = Ways::firstOrCreate([]);
        $ways->items = $request->input('ways.items', []);
        $ways->save();

        Toast::success('Ways succesfuly save!');
        return redirect()->route('platform.ways');
    }
}
