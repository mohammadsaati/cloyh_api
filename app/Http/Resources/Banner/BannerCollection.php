<?php

namespace App\Http\Resources\Banner;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BannerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($banner) {
            return [
                "image"             =>  imageGenerate("Banner" , $banner->image) ,
                "type"              =>  $banner->type ,
                "category_id"       =>  $banner->category_id ,
                "product_id"        =>  $banner->product_id ,
                "link"              =>  $banner->link
            ];
        });
    }
}
