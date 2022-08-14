<?php

namespace App\Filament\Resources\Shop\PaymentResource\Pages;

use App\Events\Shop\EntityEvent;
use App\Filament\Resources\Shop\OrderResource;
use App\Filament\Resources\Shop\PaymentResource;
use App\Services\Event\EventManager;
use Filament\Pages\Actions;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditPayment extends EditRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getRedirectUrl(): string
    {
        return OrderResource::getUrl();
    }

    protected function afterSave(): void
    {
        event(new EntityEvent(
            Auth::user(),
            $this->getMountedActionFormModel(),
            EventManager::paymentUpdated(),
        ));
    }

    protected function getActions(): array
    {
        return [
            DeleteAction::make()
                ->after(function () {
                    event(new EntityEvent(
                        Auth::user(),
                        $this->getMountedActionFormModel(),
                        EventManager::paymentDeleted(),
                    ));
                })
        ];
    }
}
