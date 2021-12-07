<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Item\ItemCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            "id"                        =>  $this->resource->id ,
            "slug"                      =>  $this->resource->slug ,
            "name"                      =>  $this->resource->name ,
            "items"                     =>  new ItemCollection($this->resource->items)
        ];
    }
}
