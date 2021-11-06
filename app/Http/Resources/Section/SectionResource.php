<?php

namespace App\Http\Resources\Section;

use App\Filters\ItemFilter;
use App\Http\Resources\Item\ItemCollection;
use App\Models\Item;
use App\Services\SectionService;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    private $filter;

    public function __construct($resource , ItemFilter $filter = null)
    {
        parent::__construct($resource);

        $this->filter = $filter;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name"              =>  $this->name ,
            "slug"              =>  $this->slug ,
            "bg_image"          =>  imageGenerate("sections" , $this->bg_image) ,
            "bg_color"          =>  $this->bg_color ,
            "items"             =>  new ItemCollection($this->items()->paginate(20)) ,
        ];
    }
}

