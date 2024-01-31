<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\MaintenanceResource;

class CreateMaintenance extends CreateRecord
{
    protected static string $resource = MaintenanceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['is_open'] = 1;
        $data['account'] = auth()->user()->name;
        $data['ticket'] = 'JB-' . Str::random(4) . '-' . date('dmYs');

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'New ticket created';
    }
}
