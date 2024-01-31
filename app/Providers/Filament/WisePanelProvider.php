<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Awcodes\Overlook\OverlookPlugin;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Middleware\Authenticate;
use Kenepa\ResourceLock\ResourceLockPlugin;
use Awcodes\Overlook\Widgets\OverlookWidget;
use lockscreen\FilamentLockscreen\Lockscreen;
use pxlrbt\FilamentSpotlight\SpotlightPlugin;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Awcodes\FilamentQuickCreate\QuickCreatePlugin;
use Brickx\MaintenanceSwitch\MaintenanceSwitchPlugin;
use FilipFonal\FilamentLogManager\FilamentLogManager;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Yebor974\Filament\RenewPassword\RenewPasswordPlugin;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;
use Tapp\FilamentAuthenticationLog\FilamentAuthenticationLogPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\FilamentSpatieLaravelHealthPlugin;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;

class WisePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->spa()
            ->login()
            ->path('')
            ->default()
            ->profile()
            ->passwordReset()
            ->font('Quicksand')
            ->emailVerification()
            ->databaseNotifications()
            ->id('wise')->authGuard('web')
            ->brandName('WISE Ticket App')
            ->sidebarCollapsibleOnDesktop()
            ->favicon(asset('favicon.ico'))
            ->pages([Pages\Dashboard::class])
            ->databaseNotificationsPolling('1s')
            ->brandLogo(fn () => view('components.icons.logo'))
            ->viteTheme('resources/css/filament/wise/theme.css')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->colors([
                'primary' => Color::Amber, 'purple' => Color::Purple,
                'lime' => Color::Lime
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
                // Addons
                OverlookWidget::class,
            ])
            ->plugins([
                new Lockscreen(),
                new RenewPasswordPlugin(),
                FilamentAuthenticationLogPlugin::make(),
                FilamentSpatieRolesPermissionsPlugin::make(),
                QuickCreatePlugin::make()
                    // ->hidden(fn () => Filament::getTenant()->requiresOnboarding())
                    // ->excludes([
                    //     PermissionResource::class,
                    //     RoleResource::class,
                    //     AuthenticationLogResource::class,
                    // ])
                    ->slideOver(),
                MaintenanceSwitchPlugin::make(),
                SpotlightPlugin::make(),
                FilamentApexChartsPlugin::make(),
                EnvironmentIndicatorPlugin::make()
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()?->hasRole('Super Admin'))
                            return true;
                        else
                            return false;
                    })
                    ->showBorder(false)
                    ->color(fn () => match (app()->environment()) {
                        'production' => Color::Blue,
                        'staging' => Color::Orange,
                        default => Color::Red,
                    }),
                OverlookPlugin::make()
                    ->sort(2)
                    // ->excludes([
                    //     \App\Filament\Resources\UserResource::class,
                    //     \App\Filament\Resources\ItemResource::class,
                    //     \App\Filament\Resources\CausedResource::class,
                    //     \App\Filament\Resources\ResortResource::class,
                    //     \App\Filament\Resources\ProblemResource::class,
                    //     PermissionResource::class,
                    //     RoleResource::class,
                    //     AuthenticationLogResource::class,
                    // ])
                    ->alphabetical()
                    ->columns([
                        'default' => 2,
                        'sm' => 2,
                        'md' => 2,
                        'lg' => 4,
                        'xl' => 4,
                        '2xl' => null,
                    ]),
                FilamentLogManager::make(),
                ResourceLockPlugin::make(),
                FilamentSpatieLaravelHealthPlugin::make()
            ]);
    }
}
