<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson;

class Budget extends Model
{
    use HasFactory, Notifiable, HasJsonRelationships, HasLocks;

    protected $guarded = ['id'];
    protected $observables = ['rejectBudget', 'approveBudget', 'pendingBudget'];

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
        'subtotal',
        'item_subtotal',
        'taxes',
        'value',
        'items',
        'transport',
        'status',
        'editor',
    ];

    protected $casts = [
        'items' => 'json',
    ];


    // RELATIONS ==========================================================

    /**
     * Get associated with the Maintenance Model.
     */
    public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class, 'id', 'id_maintenance');
    }

    /**
     * Get the track that owns the budget id.
     */
    public function timeline(): BelongsTo
    {
        return $this->belongsTo(Timeline::class, 'id', 'id_budget');
    }

    public function item(): BelongsToJson
    {
        return $this->belongsToJson(Item::class, 'items[]->item_id');
    }

    // FUNCTIONS ==========================================================

    /**
     * Approve budget proposal
     */
    public function approveBudget()
    {
        $this->update(['status' => 'Approve']);
        $this->fireModelEvent('approveBudget', false);
    }

    /**
     * Reject budget proposal
     */
    public function rejectBudget()
    {
        $this->update(['status' => 'Rejected']);
        $this->fireModelEvent('rejectBudget', false);
    }

    /**
     * Pending budget proposal
     */
    public function pendingBudget()
    {
        $this->update(['status' => 'Pending']);
        $this->fireModelEvent('pendingBudget', false);
    }
}
