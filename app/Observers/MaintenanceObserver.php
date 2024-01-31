<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Maintenance;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class MaintenanceObserver
{
    /**
     * Handle the Maintenance "created" event.
     */
    public function created(Maintenance $maintenance): void
    {
        Notification::make()
            ->title('New Ticket!')
            ->info()
            ->body($maintenance->account . ' has added new ticket: ' . $maintenance->ticket . ' at ' . now()->format('F, d Y H:i:s') . '. Check this out ASAP!')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.problem-tickets.index')),
            ])
            ->sendToDatabase(User::where('level', 'Helpdesk')->orWhere('level', 'Super Admin')->get());
    }

    /**
     * Handle the Maintenance "updated" event.
     */
    public function updated(Maintenance $maintenance): void
    {
        // Notification::make()
        //     ->title('Maintenance Updated')
        //     ->info()
        //     ->body(auth()->user()->name . ' has updated some data at ' . now() . '.')
        //     ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the Maintenance "deleted" event.
     */
    public function deleted(Maintenance $maintenance): void
    {
        Notification::make()
            ->title('Maintenance Deleted')
            ->info()
            ->body(auth()->user()->name . ' has deleted maintenance data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the Maintenance "force deleted" event.
     */
    public function forceDeleted(Maintenance $maintenance): void
    {
        Notification::make()
            ->title('Maintenance Force Deleted')
            ->info()
            ->body(auth()->user()->name . ' has force delete at ' . now() . '.')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the custom closeMaintenance() method on this Model
     * to close the maintenance progress (set is_open to zero)
     * @param Maintenance $maintenance
     * @return void
     */
    public function closeMaintenance(Maintenance $maintenance): void
    {
        $maintenance->update(['updated_at' => now()]);

        // Send notification to all user after close maintenance
        Notification::make()
            ->title('Ticket has been closed!')
            ->success()
            ->body('Ticket: ' . $maintenance->ticket . ' has been closed after successful guidance with Engineers.')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.problem-tickets.index')),
            ])
            ->sendToDatabase(User::all());
    }

    /**
     * Handle the custom maskAsDone() method on this Model
     * to close the maintenance track (set status to Finished)
     * @param Maintenance $maintenance
     * @return void
     */
    public function markAsDone(Maintenance $maintenance): void
    {
        $maintenance->update(['updated_at' => now()]);

        // Send notification to helpdesk after mark this progress as done
        Notification::make()
            ->title('Ticket progress Finished!')
            ->success()
            ->body('Ticket: ' . $maintenance->ticket . ' were successfully repaired & carried out on ' . now()->format('F, d Y H:i:s') . '')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.problem-tickets.index')),
            ])
            ->sendToDatabase(User::where('level', 'DACSO')->orWhere('level', 'Helpdesk')->orWhere('level', 'Super Admin')->get());
    }

    /**
     * Handle the custom dispatchToEOS() method on this Model
     * @param Maintenance $maintenance
     * @return void
     */
    public function dispatchToEOS(Maintenance $maintenance): void
    {
        $maintenance->update(['updated_at' => now()]);

        // Send notification to engineer and super admin after dispatch
        Notification::make()
            ->title('Dispatch Ticket from Helpdesk')
            ->info()
            ->body('Maintenance with ticket : ' . $maintenance->ticket . ' were successfully dispatch by Helpdesk. You can download the list of items requirement right now. DO YOUR BEST & GOOD LUCK!')
            ->actions([
                Action::make('view')
                    ->label('View Ticket')
                    ->button()
                    ->color('primary')
                    ->url(route('filament.wise.resources.problem-tickets.index')),
                Action::make('view')
                    ->label('View Items')
                    ->button()
                    ->color('warning')
                    ->url(route('filament.wise.resources.budgets.index')),
            ])
            ->sendToDatabase(User::where('level', 'Super Admin')
                ->orWhere('level', 'Engineer')
                ->get());
    }
}
