<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use Filament\Actions;
use App\Models\Budget;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BudgetResource;

class ListBudgets extends ListRecords
{
    protected static string $resource = BudgetResource::class;

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
            'Waiting Approval' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('status', 'Pending');
                })
                // ->icon('heroicon-m-x-mark')
                ->badge(Budget::query()->where('status', 'Pending')->count())
                ->badgeColor('info'),
            'Approved' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('status', 'Approve');
                })
                // ->icon('heroicon-m-check-circle')
                ->badge(Budget::query()->where('status', 'Approve')->count())
                ->badgeColor('success'),
            'Rejected' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('status', 'Rejected');
                })
                // ->icon('heroicon-m-check-circle')
                ->badge(Budget::query()->where('status', 'Rejected')->count())
                ->badgeColor('danger'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'All';
    }
}
