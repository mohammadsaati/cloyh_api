<?php

namespace App\Classes\ShoppingCart;


use App\Http\Resources\ShoppingCart\ShoppingCartResource;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Services\Interfaces\ShoppingCartInterFace;

class CustomerShoppingCart implements ShoppingCartInterFace
{

    public function findOrCreateShoppingCart($request) : ShoppingCart
    {
        $shopping_cart = ShoppingCart::getCartByCustomer();

        if ($shopping_cart)
            return $shopping_cart;

       return $this->create();
    }

    public function create(): ShoppingCart
    {
        return  ShoppingCart::create([
            "customer_id"       =>  request()->get("customer_id")
        ]);
    }

    public function findShoppingCart(): ShoppingCart
    {
        $shopping_cart = ShoppingCart::getCartByCustomer();

        if (!$shopping_cart)
            abort(422 ,  trans("messages.no_shopping_cart"));

        return $shopping_cart;
    }
}
