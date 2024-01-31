<?php

namespace App\Filament\Resources\ReportResource\Pages;

use Filament\Actions;
use Spatie\Activitylog\Models\Activity;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ReportResource;

class EditReport extends EditRecord
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
