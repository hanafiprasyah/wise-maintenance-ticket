<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Site extends Model
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
        'id_resort',
        'name',
        'price',
        'editor',
    ];


    // RELATIONS ==========================================================

    /**
     * Get associated with the Resort Model.
     */
    public function resort(): HasOne
    {
        return $this->hasOne(Resort::class, 'id', 'id_resort');
    }
}
