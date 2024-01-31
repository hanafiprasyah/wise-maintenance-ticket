<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Report;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class ReportObserver
{
    /**
     * Handle the Report "created" event.
     */
    public function created(Report $report): void
    {
        Notification::make()
            ->title('New Report from User!')
            ->danger()
            ->body(auth()->user()->name . ' has created new report for you at ' . now() . '')
            ->sendToDatabase(User::where('level', 'Super Admin')->get());
    }

    /**
     * Handle the Report "updated" event.
     */
    public function updated(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "deleted" event.
     */
    public function deleted(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "restored" event.
     */
    public function restored(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "force deleted" event.
     */
    public function forceDeleted(Report $report): void
    {
        //
    }

    /**
     * Handle the custom updateStatusSolved() method on Report Model
     * to set status of reported = Solved
     * @param Report $report
     * @return void
     */
    public function updateStatusSolved(Report $report): void
    {
        $report->update(['updated_at' => now()]);

        // Send notification to User
        Notification::make()
            ->title('Issues solved!')
            ->success()
            ->body('Your issues information has been solved by Super Admin at ' . now() . '. Please do not hesitate to report back if there are any problems/issues on our application. Thank you!')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.feedback.index')),
            ])
            ->sendToDatabase(User::where('id', $report->id_user)->get());
    }
}
