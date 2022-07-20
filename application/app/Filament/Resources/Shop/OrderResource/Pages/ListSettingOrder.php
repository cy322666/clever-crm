<?php

namespace App\Filament\Resources\Shop\OrderResource\Pages;

use App\Filament\Resources\Shop\OrderResource;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\CreateAction;
use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListSettingOrder extends Page
{
    protected static ?string $title = 'Настройки для заказов';

    protected static string $resource = OrderResource::class;

    protected static string $view = 'filament.pages.order-settings';

    protected function getHeaderWidgets(): array
    {
        return [
            OrderResource\Widgets\SettingsPageWidget::class,
        ];
    }
}

//Tabs\Tab::make('Заказы')
//    ->schema([
//        TextInput::make('Статусы')
//            ->label('Поля заказов'),
//        Placeholder::make('')
//            ->content(''),
//
//        TextInput::make('Поля')
//            ->label('Причины отказов'),
//        Placeholder::make('')
//            ->content(''),
//    ])->columns(2),
/*
 *   Tabs\Tab::make('Статусы')
                        ->schema([
                            TextInput::make('shop_id')
                                ->label('Выводим и редачим'),
//                                ->isDisabled(),
                            TextInput::make('name')
                                ->label('Выводим и редачим')
                                ->required()
                                ->reactive(),
                        ]),
 */
