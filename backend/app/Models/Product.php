<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

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
}
