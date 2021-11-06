<?php

namespace App\Http\Resources\Option;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OptionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($option) {

            return [
                "name"      =>  $option->name ,
                "value"     =>  $option->value
            ];

        });
    }
}
