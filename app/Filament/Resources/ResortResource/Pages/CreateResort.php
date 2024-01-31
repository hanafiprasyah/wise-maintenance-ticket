<?php

namespace App\Filament\Resources\ResortResource\Pages;

use App\Filament\Resources\ResortResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateResort extends CreateRecord
{
    protected static string $resource = ResortResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['editor'] = auth()->user()->name;

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'New resort created';
    }
}
