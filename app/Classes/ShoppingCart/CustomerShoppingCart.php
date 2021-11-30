<?php

namespace App\Classes\ShoppingCart;


use App\Http\Resources\ShoppingCart\ShoppingCartResource;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Services\Interfaces\ShoppingCartInterFace;

class CustomerShoppingCart implements ShoppingCartInterFace
{

    public function findShoppingCart($request) : ShoppingCart
    {
        return ShoppingCart::getCartByCustomer();
    }

    public function create(): ShoppingCart
    {
        return  ShoppingCart::create([
            "customer_id"       =>  request()->get("customer_id")
        ]);
    }
}
