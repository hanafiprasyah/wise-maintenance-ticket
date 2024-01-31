<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Resort extends Model
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
        'name',
        'address',
        'editor',
    ];

    // RELATIONS ==========================================================

    /**
     * Get associated with the Contact Model.
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Resort::class, 'id', 'id_resort');
    }

    /**
     * Get associated with the Site Model.
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Resort::class, 'id', 'id_resort');
    }
}
