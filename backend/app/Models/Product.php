<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'street_id',
        'type',
        'price',
        'status',
        'address',
        'space',
        'room',
        'bath',
        'furnished',
    ];

    public function street(): BelongsTo
    {
        return $this->belongsTo(Street::class);
    }

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
