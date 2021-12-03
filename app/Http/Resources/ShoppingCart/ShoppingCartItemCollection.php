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
            return [
                "product_id"                        =>  $item->product_id ,
                "count"                             =>  $item->count ,
                "price"                             =>  (int) $item->product->prices->first()->checkDiscount() ,
                "total_price"                       =>  (int) ($item->product->prices->first()->checkDiscount() * $item->count) ,
                "slug"                              =>  $item->product->item->slug ,
                "image"                             =>  imageGenerate("items" , $item->product->item->image)
            ];
        });
    }
}
