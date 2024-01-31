<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Caused extends Model
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
        'codex',
        'name',
    ];
}
