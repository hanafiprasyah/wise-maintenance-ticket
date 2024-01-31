<?php

namespace App\Filament\Resources\ItemResource\Pages;

use Filament\Actions;
use App\Filament\Resources\ItemResource;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditItem extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
