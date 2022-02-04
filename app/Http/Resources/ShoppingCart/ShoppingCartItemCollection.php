<?php

namespace App\Http\Resources\ShoppingCart;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShoppingCartItemCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            $product_item = $item->product->item;
            $product_price = $item->product->prices->first();

            return [
                "product_id"                        =>  $item->product_id ,
                "count"                             =>  $item->count ,
                "price"                             =>  $product_price ? (int)$product_price->checkDiscount() : 0,
                "total_price"                       =>  $product_price ? (int)($product_price->checkDiscount() * $item->count) : 0,
                "slug"                              =>  $product_item ? $product_item->slug : "" ,
                "name"                              =>  $product_item ? $product_item->name : "" ,
                "color"                             =>  [
                                                                "code"  =>  $item->product->color->value ,
                                                                "name"  =>  $item->product->color->name
                                                        ] ,
                "size"                              =>  $item->product->size->value ,
                "image"                             =>  imageGenerate("items" , $product_item ? $product_item->image : "")
            ];
        });
    }
}
