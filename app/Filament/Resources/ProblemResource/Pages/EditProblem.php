<?php

namespace App\Filament\Resources\ProblemResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProblemResource;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditProblem extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = ProblemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
