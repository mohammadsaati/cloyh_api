<?php

namespace App\Http\Resources\Color;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return $this->collection->map(function ($color) {
            return [
                "id"            =>  $color["id"] ,
                "name"          =>  $color["name"] ,
                "code"          =>  $color["value"]
            ];
        });
    }
}
