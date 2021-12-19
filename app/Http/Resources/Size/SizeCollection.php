<?php

namespace App\Http\Resources\Size;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SizeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($size) {
            return [
                "id"                =>  $size["id"] ,
                "value"             =>  $size["value"]??""
            ] ;
        });
    }
}
