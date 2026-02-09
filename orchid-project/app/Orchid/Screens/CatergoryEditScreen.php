<?php

namespace App\Orchid\Screens;

use App\Models\Categories;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CatergoryEditScreen extends Screen
{

    public $categories;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Categories $categories): array
    {
        $this->categories = $categories;
        return [
            'categories' => $categories
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->categories->exists ? 'Edit category' : 'Creating a new category';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create category')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->categories->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->categories->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->categories->exists),
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
                Input::make('categories.name')
                ->title('Name')
                ->placeholder('name')
            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->categories->fill($request->get('categories'))->save();

        Toast::success('You have successfully created a category.');

        return redirect()->route('platform.category.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->categories->delete();

        Toast::success('You have successfully deleted the category.');

        return redirect()->route('platform.category.list');
    }
}
