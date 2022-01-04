<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderItemCollection extends ResourceCollection
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
            $order_product_item = $product->product->item;
            return [
                "id"                        =>  $product->id ,
                "product_id"                =>  $product->product_id ,
                "name"                      =>  $order_product_item ?  $order_product_item->name : "",
                "image"                     =>  imageGenerate("items" , $order_product_item->image ?? "") ,
                "count"                     =>  (int)$product->count ,
                "off_price"                 =>  (int)$product->off_price ?? 0 ,
                "total_price"               =>  (int)$product->total_price ,
            ];
        });
    }
}
