<?php

namespace App\Filament\Resources\CausedResource\Pages;

use App\Filament\Resources\CausedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCauseds extends ListRecords
{
    protected static string $resource = CausedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
