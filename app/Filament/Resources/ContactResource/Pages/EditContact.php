<?php

namespace App\Filament\Resources\ContactResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ContactResource;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditContact extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
