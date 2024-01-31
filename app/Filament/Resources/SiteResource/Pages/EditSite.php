<?php

namespace App\Filament\Resources\SiteResource\Pages;

use Filament\Actions;
use App\Filament\Resources\SiteResource;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditSite extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = SiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
