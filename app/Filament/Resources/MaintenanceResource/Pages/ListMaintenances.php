<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use Filament\Actions;
use App\Models\Maintenance;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MaintenanceResource;

class ListMaintenances extends ListRecords
{
    protected static string $resource = MaintenanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Closed' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('is_open', 0);
                })
                // ->icon('heroicon-m-x-mark')
                ->badge(Maintenance::query()->where('is_open', 0)->count())
                ->badgeColor('danger'),
            'Open' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('is_open', 1);
                })
                // ->icon('heroicon-m-check-circle')
                ->badge(Maintenance::query()->where('is_open', 1)->count())
                ->badgeColor('success'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'All';
    }
}
