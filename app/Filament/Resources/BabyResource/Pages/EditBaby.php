<?php

namespace App\Filament\Resources\BabyResource\Pages;

use App\Filament\Resources\BabyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBaby extends EditRecord
{
    protected static string $resource = BabyResource::class;

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
