<?php

namespace App\Filament\Resources\ResortResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ResortResource;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditResort extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = ResortResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
