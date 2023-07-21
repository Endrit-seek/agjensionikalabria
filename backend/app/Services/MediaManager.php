<?php

namespace App\Services;

use App\Contracts\MediaManager as ContractMediaManager;
use App\Models\Media;
use App\Models\Product;
use App\Models\TemporaryMedia;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaManager implements ContractMediaManager
{
    protected $disk;

    protected $directory;

    public function __construct()
    {
        $this->disk = config('media.disk');

        $this->directory = config('media.directory');
    }

    public function store(UploadedFile $file, Product $product): void
    {
        $media = Media::create($this->media($file, $product));

        $this->storeAs($file, "{$media->name}.{$media->extension}");
    }

    public function process(UploadedFile $file): string
    {
        $folder = $this->generateTemporaryDirectory();

        $file->storeAs("collection/tmp/{$folder}", $file->getClientOriginalName());

        TemporaryMedia::create([
            'directory' => $folder,
            'name' => $file->getClientOriginalName(),
        ]);

        return $folder;
    }

    public function revert(string $folder): bool
    {
        $tmp = TemporaryMedia::where('directory', $folder)->first();

        if (is_dir(storage_path("app/collection/tmp/{$folder}"))) {
            File::deleteDirectory(storage_path("app/collection/tmp/{$folder}"));
        }

        return $tmp->delete();
    }

    public function destroy(Media $media): bool
    {
        return $this->delete($media->file) && $media->delete();
    }

    public function delete(string $media): bool
    {
        if ($this->disk && $this->directory) {
            return Storage::disk($this->disk)->delete("{$this->directory}/{$media}");
        }

        return false;
    }

    public function url(Media $media): string
    {
        return url("storage/images/{$media->product_id}/{$media->name}");
    }

    private function media(UploadedFile $file, Product $product): array
    {
        return [
            'name' => rand(10000, 9999999) . '_' . now()->timestamp,
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
            'product_id' => $product->id,
        ];
    }

    private function storeAs(UploadedFile $file, string $name): void
    {
        $file->storeAs($this->directory, $name, $this->disk);
    }

    private function generateTemporaryDirectory(): string
    {
        return uniqid() . '_' . now()->timestamp;
    }
}
