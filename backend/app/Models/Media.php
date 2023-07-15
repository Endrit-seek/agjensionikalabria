<?php

namespace App\Models;

use App\Facades\MediaManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $fillable = [
        'name',
        'extension',
        'size',
        'product_id',
    ];

    protected $dispatchesEvents = [
        'deleted' => MediaDeleted::class
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function url(): string
    {
        return MediaManager::getLink($this);
    }
}
