<?php

namespace App\Http\Resources\Item;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return $this->collection->map(function ($item) {
            return [
                "id"            =>  $item->id ,
                "name"          =>  $item->name ,
                "slug"          =>  $item->slug ,
                "image"         =>  imageGenerate("items" , $item->image) ,
                "code"          =>  $item->code ,
                "category"      =>  $item->category->name??""
            ];
        });
    }
}
