<?php

namespace App\Filament\Resources\Shop;

use App\Events\Shop\Push\Task\TaskCreated;
use App\Filament\Resources\Shop\ImportResource\Pages;
use App\Models\Shop\Import;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Log;
use Livewire\TemporaryUploadedFile;

class ImportResource extends Resource
{
    protected static ?string $model = Import::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                    Forms\Components\Wizard::make([
                        Forms\Components\Wizard\Step::make('Загрузка')
                            ->description('Review your basket')
                            ->icon('heroicon-o-shopping-bag')
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->label('Тип загружаемых данных')
                                    ->required()
                                    ->options([
                                        1 => 'Клиенты',
                                        2 => 'Клиенты + Заказы',
                                        3 => 'Оплаты',
                                    ]),
//                                Forms\Components\FileUpload::make('document')
//    //                                ->acceptedFileTypes(['xlsx', 'csv'])
//                                    ->helperText('Только файлы Excel ')
//                                    ->required()
//                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
//                                        Log::info(__METHOD__, [$file->getClientOriginalName()]);
//
//
//
//                                        return (string) str($file->getClientOriginalName())->prepend('custom-prefix-');
//                                    })
                            ]),
                        Forms\Components\Wizard\Step::make('Настройка')
                            ->schema([
                                // ...
                            ]),
                        Forms\Components\Wizard\Step::make('Запуск')
                            ->schema([
                                // ...
                            ]),
                    ]),
                ])->maxWidth('3xl')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImports::route('/'),
            'create' => Pages\CreateImport::route('/create'),
            'edit' => Pages\EditImport::route('/{record}/edit'),
        ];
    }
}