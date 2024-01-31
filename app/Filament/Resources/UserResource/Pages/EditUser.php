<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Spatie\Activitylog\Models\Activity;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditUser extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        // Runs after the form fields are saved to the database.
        // creating the new user will cause an activity being logged
        $activity = Activity::all()->last();
        $activity->description; //returns 'updated'
        $activity->subject; //returns the instance of user that was created
        $activity->changes; //returns ['attributes' => ['name' => 'name', 'text' => 'text']];   
    }
}
