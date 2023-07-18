<?php

namespace App\Contracts;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\UploadedFile;

interface MediaManager {
    public function store(UploadedFile $file, Product $product): void;

    public function url(Media $media): string;

    public function destroy(Media $media): bool;

    public function delete(string $path): bool;

    public function revert(string $folder): bool;

    public function process(UploadedFile $file): string;
}
