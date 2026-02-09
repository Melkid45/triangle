<?php

namespace App\Orchid\Screens;

use App\Models\Faq;
use App\Models\SeoData;
use App\Orchid\Layouts\SeoLayout;
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
            'faq' => $faq,
            'seo' => $faq ? $faq->getSeoData() : null
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
            ])->title('Main iformation'),
            'SEO' => new SeoLayout(),
        ];
    }

    function save(Request $request) {
        $request->validate([
            'faq.title' => 'required|string|max:255',
        ]);

        $faq = Faq::firstOrCreate([]);
        $faq->fill($request->get('faq'))->save();
        //Seo

        if ($faq->seo) {
            $faq->seo->update($request->input('seo', []));
        } else {
            $seoData = array_merge(
                ['page_type' => Faq::class, 'page_id' => $faq->id],
                $request->input('seo', [])
            );
            SeoData::create($seoData);
        }
        Toast::success('Faq succesfuly save!');
        return redirect()->route('platform.faq');


    }
}
