<?php

namespace App\Filament\Resources\Shop\TaskTypeResource\Pages;

use App\Filament\Resources\Shop\TaskTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskType extends EditRecord
{
    protected static string $resource = TaskTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
