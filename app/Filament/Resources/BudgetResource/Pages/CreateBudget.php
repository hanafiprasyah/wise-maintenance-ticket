<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use App\Models\Track;
use Filament\Actions;
use App\Filament\Resources\BudgetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBudget extends CreateRecord
{
    protected static string $resource = BudgetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['editor'] = auth()->user()->name;
        $data['status'] = 'Pending';
        $data['taxes'] = 0;
        $data['item_subtotal'] = $data['subtotal'] - $data['transport'];

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'New budget created';
    }
}
