<?php

namespace App\Filament\Resources\ChildrenResource\Pages;

use App\Filament\Resources\ChildrenResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Alignment;

class CreateChildren extends CreateRecord
{
    protected static string $resource = ChildrenResource::class;

    public static string | Alignment $formActionsAlignment = Alignment::Right;

    protected static ?string $title = "Create Child";

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Child created successfully')
            ->body('The child  has been created successfully');
    }
}
