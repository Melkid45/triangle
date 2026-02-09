<?php

namespace App\Orchid\Screens;

use App\Models\Contact;
use App\Models\SeoData;
use App\Orchid\Layouts\SeoLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ContactScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $contact;
    public function query(Contact $contact): iterable
    {
        $contact = Contact::firstOrNew([]);
        return [
            'contact' => $contact,
            'seo' => $contact ? $contact->getSeoData() : null
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Contact';
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

            Button::make('Remove')
                ->icon('bs.arrow-clockwise')
                ->method('clear')
                ->novalidate(),
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
                Input::make('contact.title')
                    ->title('Title contact')
                    ->placeholder('Title'),
                Input::make('contact.email')
                    ->title('Email')
                    ->placeholder('email'),
                Input::make('contact.company')
                    ->title('Name company')
                    ->placeholder('company'),
                Input::make('contact.register')
                    ->title('Register number')
                    ->placeholder('number'),
                Input::make('contact.van')
                    ->title('Van')
                    ->placeholder('van'),
                Input::make('contact.address')
                    ->title('Address')
                    ->placeholder('address'),
                Input::make('contact.address_link')
                    ->placeholder('link')
                    ->title('Address link'),
                Input::make('contact.phone')
                    ->title('Phone')
                    ->placeholder('phone'),
            ])->title('Contact`s'),
            Layout::rows([
                Input::make('contact.footer_title')
                    ->title('Footer title')
                    ->placeholder('title'),
                Input::make('contact.copyright')
                    ->title('Copyright')
                    ->placeholder('copyright'),
            ])->title('Footer contact'),
            'SEO' => new SeoLayout()
        ];
    }
    function save(Request $request)
    {
        $request->validate([
            'contact.title' => 'string|required|max:255',
            'contact.email' => 'max:255',
            'contact.company' => 'max:255',
            'contact.register' => 'max:255',
            'contact.van' => 'max:255',
            'contact.address' => 'max:255',
            'contact.phone' => 'max:255',
            'contact.footer_title' => 'max:255',
            'contact.copyright' => 'max:255',
        ]);

        $contact = Contact::firstOrNew([]);
        $contact->fill($request->get('contact'));
        $contact->save();
        //Seo

        if ($contact->seo) {
            $contact->seo->update($request->input('seo', []));
        } else {
            $seoData = array_merge(
                ['page_type' => Contact::class, 'page_id' => $contact->id],
                $request->input('seo', [])
            );
            SeoData::create($seoData);
        }
        Toast::success('Contact`s succesfuly save!');
        return redirect()->route('platform.contact');
    }
}
