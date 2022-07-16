<?php

namespace App\Filament\Widgets;

use App\Models\Shop\Stock;
use App\Services\CacheService;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class StockList extends BaseWidget
{
    protected function getTableDescription(): ?string
    {
        return  'Первый/второй уровень или подсклад';
    }

    protected function getTableHeading(): string|Closure|null
    {
        return 'Основные склады';
    }

    //TODO second level stocks
//    protected int|string|array $columnSpan = 'full';

      //TODO dont work
    //protected int | string | array $columnSpan = '5xl';

    protected static ?int $sort = 2;


    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 5;
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    public function isTableSearchable(): bool
    {
        return false;
    }

    protected function getTableQuery(): Builder
    {
        return Stock::query()->where('shop_id', CacheService::getAccountId());
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('stock_id')
                ->label('ID')
                ->searchable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Название')
                ->url(fn ($record) => route('filament.resources.stocks.index', ['stock' => $record->stock_id]))
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Дата создания')
                ->date()
                ->sortable(),
        ];
    }
}