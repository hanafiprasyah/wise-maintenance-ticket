<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\HasManyJson;

class Item extends Model
{
    use HasFactory, Notifiable, HasJsonRelationships, HasLocks;

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
        'unit',
        'price_int',
        'editor',
    ];

    public function budget(): HasManyJson
    {
        return $this->hasManyJson(Budget::class, 'items[]->item_id');
    }
}
