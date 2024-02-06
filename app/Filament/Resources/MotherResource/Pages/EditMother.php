<?php

namespace App\Filament\Resources\MotherResource\Pages;

use App\Filament\Resources\MotherResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMother extends EditRecord
{
    protected static string $resource = MotherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
