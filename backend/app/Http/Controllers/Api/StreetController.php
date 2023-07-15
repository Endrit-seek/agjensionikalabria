<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StreetRequest;
use App\Http\Resources\StreetResource;
use App\Models\Street;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StreetController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return StreetResource::collection(Street::all());
    }

    public function store(StreetRequest $request): StreetResource
    {
        return new StreetResource(Street::create($request->validated()));
    }

    public function show(Street $street): StreetResource
    {
        return new StreetResource($street);
    }

    public function update(StreetRequest $request, Street $street): StreetResource
    {
        $street->update($request->validated());

        return new StreetResource($street);
    }

    public function destroy(Street $street): bool
    {
        return $street->delete();
    }
}
