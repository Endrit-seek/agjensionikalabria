<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilterElements;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filter;

class ProductController extends Controller
{

    public function index() {
        return new ProductCollection(Product::all());
    }

    public function store(ProductRequest $request) {

        $data = $request->validated();

        $files = $request->file('file');

        $product = Product::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? '',
            'price' => $data['price'] ?? '',
        ]);

        $product->filterElements()->create([
            'qyteti' => $data['qyteti'] ?? '',
            'lagjia' => $data['lagjia'] ?? '',
            'lloji' => $data['lloji'] ?? '',
            'statusi' => $data['statusi'] ?? '',
            'cmimi_min' => $data['cmimi_min'] ?? '',
            'cmimi_max' => $data['cmimi_max'] ?? '',
            'hapsira' => $data['hapsira'] ?? '',
            'nr_dhomave' => $data['nr_dhomave'] ?? '',
            'nr_banjove' => $data['nr_banjove'] ?? '',
            'mobiluar' => $data['mobiluar'] ?? '',
        ]);

        if($request->hasFile('file'))
        {

            $photoNumber = 0;

            $directory = 'img/' . now()->timestamp . ' - ' . $photoNumber;

            foreach ($files as $file) {

                $product->media()->create([
                    'name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                    'url' => "$directory/{$file->getClientOriginalName()}"
                ]);

                $file->storeAs($directory, $file->getClientOriginalName(), 'public');

                $photoNumber++;

            }

            return $product;

        }

    }

    public function show(Product $product) {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product, FilterElements $filterElements)
    {
        //
    }

    public function destroy(Product $product)
    {

        $productId = $product->id;

        $test = $product->join('filter_elements', 'products.id', '=', 'filter_elements.product_id');

        dd($test);

        return $product->join('filter_elements', 'products.id', '=', 'filter_elements.product_id');

    }

}
