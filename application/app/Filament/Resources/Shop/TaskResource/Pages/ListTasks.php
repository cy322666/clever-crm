<?php

namespace App\Filament\Resources\Shop\TaskResource\Pages;

use App\Filament\Resources\Shop\OrderResource;
use App\Filament\Resources\Shop\TaskResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected static ?string $navigationGroup = 'Продажи';

    protected function getTitle(): string
    {
        return 'Задачи';
    }

    protected function getHeaderWidgets(): array
    {
        return TaskResource::getWidgets();
    }

    protected function getActions(): array
    {
        return [
            Action::make('kanban')
                ->label('Канбан')
                ->url(TaskResource::getUrl('kanban')),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [25, 50, 100];
    }

    protected function getTableFiltersFormColumns(): int
    {
        return 2;
    }

    //TODO фильтры над таблицей или как
//    protected function getTableFiltersLayout(): ?string
//    {
//        return Layout::AboveContent;
//    }

//    public function successTaskClick()
//    {
//        \Illuminate\Support\Facades\Log::info(__METHOD__, [json_encode($this)]);
//    }
}
