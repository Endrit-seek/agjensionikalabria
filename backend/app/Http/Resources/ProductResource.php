<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'price' => $this->price,
            'status' => $this->status,
            'address' => $this->address,
            'space' => $this->space,
            'room' => $this->room,
            'bath' => $this->bath,
            'furnished' => $this->furnished,
            $this->mergeWhen($this->street, [
                'city' => $this->street->city->name,
                'street' => $this->street->name,
            ]),
            'collection' => MediaResource::collection($this->whenLoaded('medias')),
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
