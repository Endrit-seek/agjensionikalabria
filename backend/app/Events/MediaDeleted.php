<?php

namespace App\Events;

use App\Facades\MediaManager;
use App\Models\Media;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MediaDeleted
{
    use Dispatchable, SerializesModels;

    public function __construct(Media $media)
    {
        MediaManager::delete(`{$media->name}.{$media->extension}`);
    }
}
