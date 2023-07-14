<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'mime_type',
        'name',
        'size',
        'url',
    ];

    public function post()
    {
        return $this->belongsTo(Product::class);
    }



}
