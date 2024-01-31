<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditProduct extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
