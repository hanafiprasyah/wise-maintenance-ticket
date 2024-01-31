<?php

namespace App\Filament\Resources\CausedResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use App\Filament\Resources\CausedResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCaused extends CreateRecord
{
    protected static string $resource = CausedResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['codex'] = 'wisecsd-' . Str::random(3) . '-mtc' . date('dmY');

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'New caused created';
    }
}
