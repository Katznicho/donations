<?php

namespace App\Filament\Resources\MotherResource\Pages;

use App\Filament\Resources\MotherResource;
use Filament\Actions;
use Carbon\Carbon;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListMothers extends ListRecords
{
    protected static string $resource = MotherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            // 'active' => Tab::make()
            //     ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true)),
            // 'inactive' => Tab::make()
            //     ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),
            'Today' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereDate('created_at', Carbon::today())),
            'This week' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereMonth('created_at', Carbon::now()->month)),
            'This Year' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereYear('created_at', Carbon::now()->year)),
            'Last Year' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereYear('created_at', Carbon::now()->subYear()->year)),
            "Sponsored" => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_sponsored', true)),

        ];
    }
}
