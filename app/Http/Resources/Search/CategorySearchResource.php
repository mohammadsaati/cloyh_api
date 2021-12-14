<?php

namespace App\Http\Resources\Search;

use App\Filters\ItemFilter;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Color\ColorCollection;
use App\Http\Resources\Item\ItemCollection;
use App\Http\Resources\Size\SizeCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorySearchResource extends JsonResource
{
    private $item_filters;

    public function __construct($resource , ItemFilter $filter)
    {
        $this->item_filters = $filter;
        parent::__construct($resource);
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
            "color_ids"                         =>  $this->resource["color_ids"] ,
            "category_ids"                      =>  $this->resource["category_ids"] ,
            "categories"                        =>  new CategoryCollection( $this->resource["categories"] ),
            "sub_categories"                    =>  new CategoryCollection( $this->resource["sub_categories"] ) ,
            "items"                             =>  new ItemCollection( $this->resource["items"] ) ,
            "colors"                            =>  new ColorCollection( $this->resource["colors"] ) ,
            "sizes"                             =>  new SizeCollection( $this->resource["sizes"] ) ,
        ];
    }
}
