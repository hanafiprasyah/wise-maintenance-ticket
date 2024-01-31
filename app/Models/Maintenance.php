<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Maintenance extends Model
{
    use HasFactory, Notifiable, HasLocks;

    protected $guarded = ['id'];
    protected $observables = ['closeMaintenance', 'markAsDone', 'dispatchToEOS'];

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
        'id_site',
        'ticket',
        'is_open',
        'account',
        'pic',
        'problem',
        'note',
        'status',
        'dispatch_status'
    ];

    protected $casts = [
        'problem' => 'array',
    ];


    // RELATIONS ==========================================================

    /**
     * Get associated with the Site Model.
     */
    public function site(): HasOne
    {
        return $this->hasOne(Site::class, 'id', 'id_site');
    }

    /**
     * Get associated with the Budget Model.
     */
    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class, 'id', 'id_maintenance');
    }

    /**
     * Get associated with the Contact Model.
     */
    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'name', 'pic');
    }

    /**
     * Get associated with the Timeline Maintenance Model.
     */
    public function timelineMaintenance(): BelongsTo
    {
        return $this->belongsTo(TimelineMaintenance::class, 'id', 'id_maintenance');
    }

    // FUNCTIONS ==========================================================

    /**
     * Set is_open to zero (Close Activity)
     */
    public function closeMaintenance()
    {
        $this->update([
            'is_open' => 0,
            'status' => 'Finished'
        ]);

        $this->fireModelEvent('closeMaintenance', false);
    }

    /**
     * Set status to finished
     */
    public function markAsDone()
    {
        $this->update([
            'status' => 'Finished'
        ]);

        $this->fireModelEvent('markAsDone', false);
    }

    /**
     * Dispatch to EOS
     */
    public function dispatchToEOS()
    {
        $this->update([
            'dispatch_status' => 'Dispatched to EOS'
        ]);

        $this->fireModelEvent('dispatchToEOS', false);
    }
}
