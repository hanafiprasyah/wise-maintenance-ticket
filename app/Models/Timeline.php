<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Timeline extends Model
{
    use HasFactory, Notifiable, HasLocks;

    protected $guarded = ['id'];

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
        'id_budget',
        'reject_reason',
        'repellent',
    ];


    // RELATIONS ==========================================================

    /**
     * Get the timeline from the budget table.
     */
    public function budget(): HasOne
    {
        return $this->hasOne(Budget::class, 'id', 'id_budget');
    }
}
