<?php

namespace App\Filament\Widgets;

use App\Models\Children;
use App\Models\Mother;
use App\Models\Sponsor;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [



            Stat::make('Total Sponsored Children', Children::where("is_sponsored", true)->count())
                ->icon('heroicon-o-arrow-trending-up')
                ->description('Total number of sponsored children')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 9])
                ->url(route('filament.admin.resources.childrens.index'))
                ->extraAttributes([
                    'class' => 'text-white text-lg cursor-pointer',
                ]),

            Stat::make('Total Sponsored Mothers', Mother::where("is_sponsored", true)->count())
                ->icon('heroicon-o-arrow-trending-up')
                ->description('Total number of cards')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 9])
                ->url(route('filament.admin.resources.mothers.index'))
                ->extraAttributes([
                    'class' => 'text-white text-lg cursor-pointer',
                ]),

            Stat::make('Total Sponsored Children', Children::where("is_sponsored", true)->count())
                ->icon('heroicon-o-arrow-trending-up')
                ->description('Total number of sponsored children')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 9])
                ->url(route('filament.admin.resources.childrens.index'))
                ->extraAttributes([
                    'class' => 'text-white text-lg cursor-pointer',
                ]),

            Stat::make('Total Sponsored Mothers', Mother::where("is_sponsored", true)->count())
                ->icon('heroicon-o-arrow-trending-up')
                ->description('Total number of cards')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 9])
                ->url(route('filament.admin.resources.mothers.index'))
                ->extraAttributes([
                    'class' => 'text-white text-lg cursor-pointer',
                ]),
        ];
    }
}
