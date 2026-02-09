<?php

namespace App\Orchid\Screens;

use App\Models\Career;
use App\Models\CareerBLock;
use App\Models\SeoData;
use App\Orchid\Layouts\CareerListLayout;
use App\Orchid\Layouts\SeoLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CareerListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {

        $careerBlock = CareerBLock::firstOrNew([]);
        return [
            'career' => Career::paginate(),
            'career-block' => $careerBlock,
            'seo' => $careerBlock ? $careerBlock->getSeoData() : null
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Job`s List';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.job.edit'),
                Button::make('Save page')
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
                Input::make('career-block.title')
                ->title('Title career')
                ->placeholder('Type career title')
            ])->title('Career title'),
            CareerListLayout::class,
            'SEO' => new SeoLayout()
        ];
    }
    function save(Request $request) {
        $careerBlock = CareerBLock::firstOrCreate([]);
        $careerBlock->fill($request->get('career-block'))->save();
        // Seo
        if ($careerBlock->seo) {
            $careerBlock->seo->update($request->input('seo', []));
        } else {
            $seoData = array_merge(
                ['page_type' => CareerBLock::class, 'page_id' => $careerBlock->id],
                $request->input('seo', [])
            );
            SeoData::create($seoData);
        }
        Toast::success('Title career saved');
        return redirect()->route('platform.job.list');
    }
}
