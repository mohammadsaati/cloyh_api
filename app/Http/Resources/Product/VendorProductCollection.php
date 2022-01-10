<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Price\PriceCollection;
use App\Http\Resources\Price\PriceResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VendorProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($product) {
            return [
                "id"                        =>  $product->id ,
                "color"                     =>  [
                    "id"        =>  $product->color->id ,
                    "color"     =>  $product->color->name ,
                    "code"     =>  $product->color->value
                ] ,
                "size"                      =>  $product->size->value ,
                "stock"                     =>  (int) $product->stock ,
                "current_price"             =>  new PriceResource( $product->prices->first() ) ,
                "price_changes"             =>  new PriceCollection( $product->Prices )
            ];
        });
    }
}
