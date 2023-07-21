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
        'street',
        'city_id',
        'type',
        'price',
        'status',
        'address',
        'space',
        'room',
        'bath',
        'furnished',
    ];

    protected $with = [
        'medias'
    ];

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
