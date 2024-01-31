<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\MaintenanceResource;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditMaintenance extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = MaintenanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
