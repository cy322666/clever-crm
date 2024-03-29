<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\ReportResource\Pages;
use App\Models\Shop\Report;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationLabel = 'Отчеты';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
//            'create' => Pages\CreateReport::route('/create'),
//            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
