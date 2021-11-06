<?php

namespace App\Http\Resources\Slider;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($slider) {
            return [
                "title"             =>  $slider->title ,
                "priority"          =>  $slider->priority ,
                "type"              =>  $slider->type ,
                "image"             =>  imageGenerate("Sliders" , $slider->image) ,
                "category_id"       =>  $slider->category_id ,
                "product_id"        =>  $slider->product_id ,
                "link"              =>  $slider->link
            ];
        });
    }
}
