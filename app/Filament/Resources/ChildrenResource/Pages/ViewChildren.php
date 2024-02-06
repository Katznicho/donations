<?php

namespace App\Filament\Resources\ChildrenResource\Pages;

use App\Filament\Resources\ChildrenResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewChildren extends ViewRecord
{
    protected static string $resource = ChildrenResource::class;

    protected static ?string $title = "View Child";

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
