<?php

namespace App\Orchid\Screens;

use App\Models\Categories;
use App\Models\Works;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class WorksEditScreen extends Screen
{

    /**
     * @var Works
     */
    public $works;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Works $works): array
    {
        $this->works = $works;
        $categories = Categories::all()->pluck('name', 'id')->toArray();
        return [
            'works' => $works,
            'categories' => $categories,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->works->exists ? 'Edit work' : 'Creating a new work';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create work')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->works->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->works->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->works->exists),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {

        $categories = Categories::all()->pluck('name', 'id')->toArray();
        return [
            Layout::rows([
                Input::make('works.name')
                    ->title('Name work')
                    ->placeholder('Name'),
                Input::make('works.type')
                    ->title('Type work')
                    ->placeholder('Type'),
                Select::make('works.categories')
                    ->title('Categories')
                    ->multiple()
                    ->options($categories)
                    ->empty('No select')
                    ->help('Select categories for this work'),
                Upload::make('works.preview')
                    ->title('Work Preview')
                    ->maxFiles(1),
                Input::make('works.link')
                    ->title('Work Link')
                    ->placeholder('Link')
            ])
        ];
    }


    public function createOrUpdate(Request $request)
    {
        $this->works->fill($request->get('works'))->save();

        Toast::success('You have successfully created a work.');

        return redirect()->route('platform.works.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->works->delete();

        Toast::success('You have successfully deleted the work.');

        return redirect()->route('platform.works.list');
    }
}
