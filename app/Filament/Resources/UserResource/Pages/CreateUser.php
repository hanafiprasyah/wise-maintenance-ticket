<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Spatie\Activitylog\Models\Activity;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'New user created';
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        // creating the new user will cause an activity being logged
        $activity = Activity::all()->last();
        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of user that was created
        $activity->changes; //returns ['attributes' => ['name' => 'name', 'text' => 'text']];
    }
}
