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
            'street' => $this->street,
            'room' => $this->room,
            'bath' => $this->bath,
            'furnished' => $this->furnished,
            'city_id' => $this->city_id,
            'medias' => MediaResource::collection($this->whenLoaded('medias')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
