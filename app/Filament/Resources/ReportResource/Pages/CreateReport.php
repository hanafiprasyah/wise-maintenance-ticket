<?php

namespace App\Filament\Resources\ReportResource\Pages;

use Spatie\Activitylog\Models\Activity;
use App\Filament\Resources\ReportResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReport extends CreateRecord
{
    protected static string $resource = ReportResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->user()->id;
        $data['status'] = 'Issues';

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Successfully reported. Thanks for your information!';
    }
}
