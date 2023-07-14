<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

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
        'cmimi',
    ];

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function filterElements()
    {
        return $this->hasMany(FilterElements::class);
    }

}
