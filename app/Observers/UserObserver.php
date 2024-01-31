<?php

namespace App\Observers;

use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Notification::make()
            ->title('New User Created')
            ->info()
            ->body(auth()->user()->name . ' has created new user data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        Notification::make()
            ->title('User Updated')
            ->info()
            ->body(auth()->user()->name . ' has updated user data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        Notification::make()
            ->title('User Deleted')
            ->info()
            ->body(auth()->user()->name . ' has deleted user data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        Notification::make()
            ->title('User Restored')
            ->info()
            ->body(auth()->user()->name . ' has restored user data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        Notification::make()
            ->title('User Force Deleted')
            ->info()
            ->body(auth()->user()->name . ' has forced to delete user data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the custom verifyUser() method on User Model
     * to verify user email
     * @param User $user
     * @return void
     */
    public function verifyUser(User $user): void
    {
        $user->update(['updated_at' => now()]);

        // Send notification to the user after verifyUser is running
        Notification::make()
            ->title('Your account has been verified by Admin!')
            ->success()
            ->body('Welcome to WISE Ticket App! We recommend you to always maintain the confidentiality of your personal data. If there is a problem found, please contact our Super Admin (prasya.hanafi@wise.co.id)')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.auth.profile')),
            ])
            ->sendToDatabase(User::where('id', $user->id)->get());
    }

    /**
     * Handle the email verification link
     * to verify user email
     * @param User $user
     * @return void
     */
    public function sendEmailLink(User $user): void
    {
        $user->update(['updated_at' => now()]);

        // Send notification to the user after verifyUser is running
        Notification::make()
            ->title('Email Verification Link Sent!')
            ->success()
            ->body('Please check your email inbox and verify your identity')
            ->sendToDatabase(User::where('id', $user->id)->get());

        // Local notification
        Notification::make()
            ->title('Email Verification Link Sent!')
            ->success()
            ->send();
    }
}
