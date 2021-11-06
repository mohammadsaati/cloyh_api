<?php

namespace App\Http\Resources\Section;

use App\Http\Resources\Item\ItemCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SectionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($section) {
           return [
                "name"          =>  $section->name ,
                "slug"          =>  $section->slug ,
                "bg_image"      =>  imageGenerate("Section" , $section->image) ,
                "bg_color"      =>  $section->bg_color ,
                "images"        =>  new SectionImageCollection($section->images) ,
                "items"         =>  new ItemCollection($section->items)
           ];
        });
    }
}

