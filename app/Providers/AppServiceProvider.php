<?php

namespace App\Providers;

use Filament\Pages\Page;
use Spatie\Health\Facades\Health;
use Illuminate\Support\ServiceProvider;
use Filament\Notifications\Notification;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Illuminate\Validation\ValidationException;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
        //     $switch
        //         ->circular()
        //         ->displayLocale('en')
        //         ->locales(['en', 'id']); // also accepts a closure
        // });

        Page::$reportValidationErrorUsing = function (ValidationException $exception) {
            Notification::make()
                ->title($exception->getMessage())
                ->danger()
                ->send();
        };

        Health::checks([
            CacheCheck::new(),
            SecurityAdvisoriesCheck::new(),
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(60)
                ->failWhenUsedSpaceIsAbovePercentage(80),
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            ScheduleCheck::new(),
            PingCheck::new()->url('https://google.com'),
            DatabaseCheck::new(),
            DatabaseConnectionCountCheck::new()
                ->failWhenMoreConnectionsThan(100),
            DatabaseTableSizeCheck::new()
                ->table('maintenances', maxSizeInMb: 2_000)
                ->table('notifications', maxSizeInMb: 1_000)
                ->table('timelines', maxSizeInMb: 1_000)
                ->table('timeline_tickets', maxSizeInMb: 1_000)
                ->table('budgets', maxSizeInMb: 2_000),
        ]);
    }
}
