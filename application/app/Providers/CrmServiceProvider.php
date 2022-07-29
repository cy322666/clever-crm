<?php

namespace App\Providers;

use App\Filament\Navigations\Sidebar\NavigationMap;
use App\Filament\Pages\Import;
use App\Filament\Pages\Profile;
use App\Filament\Pages\Shops;
use App\Filament\Resources\Shop\ImportResource;
use App\Filament\Resources\Shop\ShopResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CrmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //TODO sockets
//        Filament::registerScripts([
//            asset('js/websocket.js'),
//        ]);

        //sidebar
        Filament::serving(function () {

            Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {

                foreach (NavigationMap::sidebar() as $groupName => $items) {

                    $builder->group($groupName, $items);
                }

                $builder->items(NavigationMap::raw());

                return  $builder;
            });

            //TODO crash
//        $this->app->bind('events', 'App\Services\Event\EventService');


            //notification component
            Filament::registerRenderHook(
                'global-search.end',
                fn (): string => Blade::render('@livewire(\'notification\')')
            );

            //user menu
            Filament::registerUserMenuItems([

                UserMenuItem::make()
                    ->label('Аккаунты')
                    ->url(ShopResource::getUrl())
                    ->icon('heroicon-s-cog'),

                UserMenuItem::make()
                    ->label('Импорт')
                    ->url(ImportResource::getUrl())
                    ->icon('heroicon-s-cog'),

                UserMenuItem::make()
                    ->label('Экспорт')
                    ->url(ShopResource::getUrl())
                    ->icon('heroicon-s-cog'),

                //Profile::class
            ]);

            //custom colors
            Filament::registerTheme(asset('css/app.css'));

            //TODO add in <head>
//            Filament::pushMeta([
//                new HtmlString('<link rel="manifest" href="/site.webmanifest" />'),
//            ]);

//            Filament::registerScripts([
//                asset('js/my-script.js'),
//            ]);
//
//            Filament::registerStyles([
//                'https://unpkg.com/tippy.js@6/dist/tippy.css',
//                asset('css/my-styles.css'),
//            ]);
            Filament::registerStyles([
                asset('css/crm.css'),
            ]);
        });
    }
}
