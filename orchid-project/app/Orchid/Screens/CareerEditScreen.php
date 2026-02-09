<?php

namespace App\Orchid\Screens;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CareerEditScreen extends Screen
{
    public $career;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Career $career): array
    {
        $this->career = $career;
        return [
            'career' => $career
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->career->exists ? 'Edit job' : 'Creating a new job';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create job')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->career->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->career->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->career->exists),
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
                Input::make('career.type')
                    ->title('Type job')
                    ->placeholder('Type'),
                Input::make('career.name')
                    ->title('Name job')
                    ->placeholder('Name'),
                Input::make('career.role')
                    ->title('Role job')
                    ->placeholder('Role'),
                Upload::make('career.poster')
                    ->title('Poster'),
                Group::make([
                    Input::make('career.location')
                        ->title('Location job')
                        ->placeholder('Location'),
                    DateTimer::make('career.date')
                        ->title('Date job')
                        ->format('d M Y')
                        ->allowInput()
                        ->placeholder('Date'),
                    Input::make('career.employment')
                        ->title('Employment job')
                        ->placeholder('Employment'),
                ])->fullWidth(),
                TextArea::make('career.common_description')
                    ->title('Description in footer job')
                    ->rows(5)
            ])->title('Main Information'),
            Layout::rows([
                Group::make([
                    Input::make('career.payment')
                    ->placeholder('salary')
                    ->title('Salary'),
                    Input::make('career.experience')
                    ->title('Experience')
                    ->placeholder('experience'),
                    Input::make('career.days')
                    ->title('Working days')
                    ->placeholder('Days'),
                    Input::make('career.hours')
                    ->title('Working hours')
                    ->placeholder('Hours'),
                ])
            ])->title('Working conditions'),
            Layout::rows([
                TextArea::make('career.summary_description')
                    ->title('Description Job Summary')->rows(5),
            ])->title('Job Summary'),
            Layout::rows([
                Matrix::make('career.responsibilities')
                    ->columns([
                        'Point' => 'point'
                    ])
                    ->fields([
                        'point' => Input::make()
                    ])
            ])->title('Key Responsibilities'),
            Layout::rows([
                Matrix::make('career.qualifications')
                    ->columns([
                        'Point' => 'point'
                    ])
                    ->fields([
                        'point' => Input::make()
                    ])
            ])->title('Qualifications'),
            Layout::rows([
                TextArea::make('career.perks_description')
                    ->title('Description')->rows(5),
                Matrix::make('career.perks_list')
                    ->columns([
                        'Point' => 'point'
                    ])
                    ->fields([
                        'point' => Input::make()
                    ])
            ])->title('Perks & Benefits')
        ];
    }
    public function createOrUpdate(Request $request)
    {
        $this->career->fill($request->get('career'))->save();

        Toast::success('You have successfully created a job.');

        return redirect()->route('platform.job.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->career->delete();

        Toast::success('You have successfully deleted the job.');

        return redirect()->route('platform.job.list');
    }
}
