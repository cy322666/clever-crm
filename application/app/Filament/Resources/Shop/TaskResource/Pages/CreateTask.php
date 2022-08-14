<?php

namespace App\Filament\Resources\Shop\TaskResource\Pages;

use App\Events\Shop\EntityEvent;
use App\Filament\Resources\Shop\TaskResource;
use App\Services\Event\EventManager;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function getTitle(): string
    {
        return ''; // TODO: Change the autogenerated stub
    }
}
