<?php

namespace App\Orchid\Screens;

use App\Models\Faq;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FaqScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $faq = Faq::firstOrNew([]);
        return [
            'faq' => $faq
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Faq';
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
            ->method('save')
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
                Input::make('faq.title')
                ->title('Faq title')
                ->placeholder('title'),
                Matrix::make('faq.items')
                ->columns([
                    'Title' => 'title',
                    'Description' => 'description'
                ])
                ->fields([
                    'title' => Input::make(),
                    'description' => TextArea::make()->rows(3)
                ])
            ])
        ];
    }

    function save(Request $request) {
        $request->validate([
            'faq.title' => 'required|string|max:255',
        ]);

        $faq = Faq::firstOrCreate([]);
        $faq->fill($request->get('faq'))->save();

        Toast::success('Faq succesfuly save!');
        return redirect()->route('platform.faq');


    }
}
