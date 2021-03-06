<?php

namespace App\Http\Resources\Product;

use App\Exceptions\ProductException;
use App\Filters\ProductFilter ;
use App\Http\Resources\Color\ColorCollection;
use App\Http\Resources\Item\ItemCollection;
use App\Http\Resources\Size\SizeCollection;
use App\Http\Resources\Vendor\ItemVendorCollection;
use App\Http\Resources\Vendor\ProductVendorCollection;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    private $filters;

    public function __construct($resource , ProductFilter $filter)
    {
        parent::__construct($resource);
        $this->filters = $filter;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = $this->products()->Filter($this->filters);

        if (!count($products->get()))
        {
            abort(422 , ProductException::NoProduct()->getMessage());
        }

        return [
            "id"                    =>  $this->id ,
            "name"                  =>  $this->name ,
            "slug"                  =>  $this->slug ,
            "category"              =>  $this->category ? $this->category->name : "" ,
            "category_slug"         =>  $this->category ? $this->category->slug : "" ,
            "category_id"           =>  $this->category_id ,
            "images"                =>  imageGenerate( "items" ,$this->image ) ,
            "colors"                =>  new ColorCollection( ProductService::GetColors( $this->products ) ) ,
            "sizes"                 =>  new SizeCollection(  ProductService::GetSize( $this->products ) ) ,
            "description"           =>  $this->description ,
            "similar_items"         => $this->category ? new ItemCollection( CategoryService::getSimilarItems($this->category , $this->id )->get() ) : [],
            "vendors"               => new ItemVendorCollection( $this->vendors ) ,
        ];
    }
}
