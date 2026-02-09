<?php

namespace App\Orchid\Screens;

use App\Models\Partners;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PartnersScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $partners = Partners::firstOrNew([]);
        return [
            'partners' => $partners
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Partners';
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
                Upload::make('partners.partner')
                ->title('Partner Logo')
            ])
        ];
    }

    function save(Request $request) {

        $partners = Partners::firstOrNew([]);
        $partners->fill($request->get('partners'));
        $partners->save();

        Toast::success('Partners succesfuly save!');
        return redirect()->route('platform.partners');
    }
}
