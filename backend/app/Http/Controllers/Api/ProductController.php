<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\TemporaryMedia;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::with('medias')->paginate(9));
    }

    public function store(ProductRequest $request): ProductResource
    {
        return new ProductResource(Product::create($request->validated()));
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
