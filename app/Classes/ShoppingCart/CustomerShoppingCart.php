<?php

namespace App\Classes\ShoppingCart;


use App\Http\Resources\ShoppingCart\ShoppingCartResource;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Services\Interfaces\ShoppingCartInterFace;

class CustomerShoppingCart implements ShoppingCartInterFace
{

    public function store($request)
    {
        $created_cart = ShoppingCart::create([
            "customer_id"      =>  request()->get("customer_id")
        ]);

        $shopping_cart_item = ShoppingCartItem::create([
            "cart_id"           =>  $created_cart ,
            "product_id"        =>  $request["product_id"] ,
            "count"             =>  $request["count"]
        ]);

        return new ShoppingCartResource($created_cart);
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function fetch()
    {
        // TODO: Implement fetch() method.
    }


}
