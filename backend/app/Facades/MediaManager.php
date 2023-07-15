<?php

namespace App\Facades;

use App\Contracts\MediaManager as ContractMediaManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void store(\Illuminate\Http\UploadedFile $file, \App\Models\Product $product)
 * @method static void destroy(\App\Models\Media $media)
 * @method static string url(\App\Models\Media $media)
 * @method static bool delete(string $path)
 * @source \App\Contracts\Media
 */
class MediaManager extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ContractMediaManager::class;
    }
}
