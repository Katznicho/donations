<?php

namespace App\Filament\Resources\MotherResource\Pages;

use App\Filament\Resources\MotherResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMother extends CreateRecord
{
    protected static string $resource = MotherResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Mother created successfully')
            ->body('The mother  has been created successfully');
    }
}
