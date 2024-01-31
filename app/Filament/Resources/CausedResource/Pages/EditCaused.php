<?php

namespace App\Filament\Resources\CausedResource\Pages;

use App\Filament\Resources\CausedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditCaused extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = CausedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
