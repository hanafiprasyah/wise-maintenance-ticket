<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Report extends Model
{
    use HasFactory, Notifiable, HasLocks;

    protected $guarded = ['id'];
    protected $observables = ['updateStatusSolved'];

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
        'content',
        'status',
        'id_user'
    ];

    /**
     * Get associated with the Users Model.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    // FUNCTIONS ==========================================================

    /**
     * Approve budget proposal
     */
    public function updateStatusSolved()
    {
        $this->update(['status' => 'Solved']);
        $this->fireModelEvent('updateStatusSolved', false);
    }
}
