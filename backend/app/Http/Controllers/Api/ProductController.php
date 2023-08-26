<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\TemporaryMedia;
use App\Models\Media;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::paginate(9));
    }

    public function store(ProductRequest $request): ProductResource
    {
        // Find medias through ID's
        // dd($request);
        $product = Product::create($request->validated());
        $files = $request->medias;
        if($files) {
            foreach($files as $media) {
                if($dir = TemporaryMedia::where('directory', $media)->first()) {
                    Storage::makeDirectory('public/images/' . $product->id);
                    // Move temporary medias to storage
                Storage::move(
                    'public/images/tmp/' . $dir->directory . '/' . $dir->name,
                    'public/images/' . $product->id . '/' . $dir->name
                );

                // Save the medias to the database
                Media::create([
                    'name' => $dir->name,
                    'extension' => Storage::mimeType('public/images/' . $product->id . '/' . $dir->name),
                    'size' => Storage::size('public/images/' . $product->id . '/' . $dir->name),
                    'product_id' => $product->id
                ]);

                $dir->delete();
                Storage::deleteDirectory('public/images/tmp/' . $dir->directory);
            }
            }
        }
        return new ProductResource($product);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function update(ProductRequest $request, Product $product): ProductResource
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    public function destroy(Product $product): bool
    {
        return $product->delete();
    }
}
