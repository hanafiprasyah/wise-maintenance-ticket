<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Auth\Notifications\VerifyEmail;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Yebor974\Filament\RenewPassword\Traits\RenewPassword;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLoggable, HasRoles, HasSuperAdmin, RenewPassword, HasLocks, LogsActivity;

    protected $guarded = ['id'];
    protected $observables = ['verifyUser', 'sendEmailLink'];

    protected function getDefaultGuardName(): string
    {
        return 'web';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'level', 'email']);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'last_renew_password_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // FUNCTIONS ==========================================================

    /**
     * Set email verified to current date
     */
    public function verifyUser()
    {
        $this->markEmailAsVerified();

        $this->fireModelEvent('verifyUser', false);
    }

    /**
     * Send email verification link to selected user
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);

        $this->fireModelEvent('sendEmailLink', false);
    }

    /**
     * Ask user to renew their password after 90 days
     */
    public function needRenewPassword(): bool
    {
        return Carbon::parse($this->last_renew_password_at ?? $this->created_at)->addDays(90) < now();
    }
}
