<?php

namespace App\Http\Resources;

use App\Http\Resources\Banner\BannerCollection;
use App\Http\Resources\Category\MenuResource;
use App\Http\Resources\Option\OptionCollection;
use App\Http\Resources\Section\HomeSectionCollection;
use App\Http\Resources\Slider\SliderCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
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
            "sliders"           =>  new SliderCollection( $this->resource["sliders"] ) ,
            "banners"           =>  new BannerCollection( $this->resource["banners"] ) ,
            "sections"          =>  new HomeSectionCollection( $this->resource["sections"] ) ,
            "menu"              =>  new MenuResource($this->resource["menu"]) ,
            "options"           =>  new OptionCollection($this->resource["options"])
        ];
    }
}
