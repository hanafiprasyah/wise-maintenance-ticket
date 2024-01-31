<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
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
        'phone',
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
