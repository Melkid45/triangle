<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Home')
                ->icon('bs.house')
                ->title('Pages')
                ->route('platform.hero'),
            Menu::make('About')
                ->icon('bs.file-person')
                ->route('platform.about'),

            Menu::make('Works')
                ->icon('bs.person-workspace')
                ->route('platform.works.list'),
            Menu::make('Faq')
                ->icon('bs.question-circle')
                ->route('platform.faq'),
            Menu::make('Career')
                ->icon('bs.person-workspace')
                ->route('platform.job.list'),
            Menu::make('Contact')
                ->icon('bs.person-rolodex')
                ->route('platform.contact'),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
