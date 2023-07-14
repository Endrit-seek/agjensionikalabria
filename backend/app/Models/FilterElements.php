<?php

namespace App\Models;

use Database\Factories\FilterElementsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterElements extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FilterElementsFactory::new();
    }

    protected $fillable = [
        'qyteti',
        'lagjia',
        'lloji',
        'statusi',
        'cmimi_min',
        'cmimi_max',
        'hapsira',
        'nr_dhomave',
        'nr_banjove',
        'mobiluar',
    ];

    public function post()
    {
        return $this->belongsTo(Product::class);
    }

}
