<?php

namespace App\Filament\Resources\ProblemResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProblemResource;

class CreateProblem extends CreateRecord
{
    protected static string $resource = ProblemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['codex'] = 'wiseprob-' . Str::random(3) . '-mtc' . date('dmY');

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'New problem created';
    }
}
