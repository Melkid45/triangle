<?php

namespace App\Orchid\Screens;

use App\Models\SeoData;
use App\Models\WorkBLock;
use App\Models\Works;
use App\Orchid\Layouts\SeoLayout;
use App\Orchid\Layouts\WorksListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class WorksListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $workBlock = WorkBLock::firstOrNew([]);
        return [
            'works' => Works::paginate(),
            'work-block' => $workBlock,
            'seo' => $workBlock ? $workBlock->getSeoData() : null
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Work`s List';
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
                ->route('platform.works.edit'),
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
                Input::make('work-block.title')
                    ->title('Work Title')
                    ->placeholder('Type work title page')
            ])->title('Work Title'),
            WorksListLayout::class,
            'SEO' => new SeoLayout(),
        ];
    }
    function save(Request $request)
    {
        $workBlock = WorkBLock::firstOrCreate([]);
        $workBlock->fill($request->get('work-block'))->save();
        if ($workBlock->seo) {
            $workBlock->seo->update($request->input('seo', []));
        } else {
            $seoData = array_merge(
                ['page_type' => WorkBLock::class, 'page_id' => $workBlock->id],
                $request->input('seo', [])
            );
            SeoData::create($seoData);
        }
        Toast::success('Work Block saved');
        return redirect()->route('platform.works.list');
    }
}
