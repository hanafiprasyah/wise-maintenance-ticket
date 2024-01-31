<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class TimelineMaintenance extends Model
{
    use HasFactory, Notifiable, HasLocks;

    protected $guarded = ['id'];
    protected $table = 'timeline_tickets';

    protected function getDefaultGuardName(): string
    {
        return 'web';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_maintenance',
        'caused',
        'type',
        'content',
        'editor',
    ];

    protected $casts = [
        'type' => 'json',
        'caused' => 'array',
    ];

    // RELATIONS ==========================================================

    /**
     * Get associated with the Maintenance Model.
     */
    public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class, 'id', 'id_maintenance');
    }
}
