<?php

namespace App\Orchid\Layouts;

use App\Models\Works;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class WorksListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'works';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Name')
                ->render(function (Works $works) {
                    return Link::make($works->name)
                        ->route('platform.works.edit', $works);
                }),
        ];
    }
}
