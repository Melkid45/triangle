<?php

namespace App\Orchid\Layouts;

use App\Models\Career;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CareerListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'career';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Name')
                ->render(function (Career $career) {
                    return Link::make($career->name)
                        ->route('platform.job.edit', $career);
                }),
        ];
    }
}
