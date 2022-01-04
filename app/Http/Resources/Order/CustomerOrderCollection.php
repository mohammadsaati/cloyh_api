<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerOrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($order) {
            return [
                "id"                    =>  $order->id ,
                "off_price"             =>  $order->off_amount ,
                "amount"                =>  $order->amount ,
                "address"               =>  $order->address->full_address ,
//                "products"              =>  new OrderItemCollection( $order->items )
            ];
        });
    }
}
