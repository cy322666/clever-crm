<?php

namespace App\Filament\Resources\Shop\TaskResource\Pages;

use App\Filament\Resources\Shop\TaskResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function getTitle(): string
    {
        return ''; // TODO: Change the autogenerated stub
    }

    protected function beforeCreate($data): void
    {
        Log::info(__METHOD__, $data);
        // Runs before the form fields are saved to the database.
    }
}