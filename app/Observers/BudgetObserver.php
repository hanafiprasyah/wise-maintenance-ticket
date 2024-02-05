<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Budget;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class BudgetObserver
{
    /**
     * Handle the Budget "created" event.
     */
    public function created(Budget $budget): void
    {
        Notification::make()
            ->title($budget->editor . ' has propose new budget for ticket: ' . $budget->maintenance->ticket . '')
            ->warning()
            ->body('Please check the completeness of the data and correct the prices offered by our Helpdesk correctly!')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.budgets.index')),
            ])
            ->sendToDatabase(User::where('level', 'Management')->orWhere('level', 'Super Admin')->get());
    }

    /**
     * Handle the Budget "updated" event.
     */
    public function updated(Budget $budget): void
    {
        // Notification::make()
        //     ->title('Budget Updated')
        //     ->info()
        //     ->body(auth()->user()->name . ' has updated some data at ' . now() . '.')
        //     ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the Budget "deleted" event.
     */
    public function deleted(Budget $budget): void
    {
        Notification::make()
            ->title('Budget Deleted')
            ->info()
            ->body(auth()->user()->name . ' has deleted budget data at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the Budget "force deleted" event.
     */
    public function forceDeleted(Budget $budget): void
    {
        Notification::make()
            ->title('Budget Force Deleted')
            ->info()
            ->body(auth()->user()->name . ' has force delete at ' . now() . '.')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the custom approveBudget() method on Budget Model
     * to set status of budget proposal = Approve
     * @param Budget $budget
     * @return void
     */
    public function approveBudget(Budget $budget): void
    {
        $budget->update(['updated_at' => now()]);

        // Send notification to All user about this approval budget
        Notification::make()
            ->title('Budget has been approved by Management!')
            ->success()
            ->body('Ticket: ' . $budget->maintenance->ticket . ' is ready for the next actions!')
            ->sendToDatabase(User::all());

        // Send notification to Engineer about this approval budget
        Notification::make()
            ->title('Ticket Assignment')
            ->warning()
            ->body('Ticket: ' . $budget->maintenance->ticket . ' has been approved. Please check carefully what items need to be replaced.')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.problem-tickets.index')),
            ])
            ->sendToDatabase(User::where('level', 'Engineer')->get());
    }

    /**
     * Handle the custom rejectBudget() method on Budget Model
     * to set status of budget proposal = Rejected
     * @param Budget $budget
     * @return void
     */
    public function rejectBudget(Budget $budget): void
    {
        $budget->update(['updated_at' => now()]);

        // Send notification to Helpdesk and Super Admin user about this rejected budget
        Notification::make()
            ->title('Budget has been rejected by Management!')
            ->danger()
            ->body('Ticket: ' . $budget->maintenance->ticket . ' cannot be made until the new revised proposal budget is approve by Management!')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.budgets.view', $budget->id)),
            ])
            ->sendToDatabase(User::where('level', 'Super Admin')->orWhere('level', 'Helpdesk')->get());
    }

    /**
     * Handle the custom pendingBudget() method on Budget Model
     * to set status of budget proposal = Pending
     * @param Budget $budget
     * @return void
     */
    public function pendingBudget(Budget $budget): void
    {
        $budget->update(['updated_at' => now()]);

        // Send notification to Helpdesk and Admin user about this rejected budget
        Notification::make()
            ->title('Budget has been pending by Management!')
            ->warning()
            ->body('Ticket: ' . $budget->maintenance->ticket . ' cannot be made until the proposal budget is approve by Management!')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.problem-tickets.index')),
            ])
            ->sendToDatabase(User::where('level', 'Super Admin')->orWhere('level', 'Helpdesk')->get());
    }
}
