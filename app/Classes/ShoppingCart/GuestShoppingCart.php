<?php

namespace App\Classes\ShoppingCart;


use App\Http\Resources\ShoppingCart\ShoppingCartResource;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Services\Interfaces\ShoppingCartInterFace;
use ApiKey;
use App\Traits\ShoppingCartTrait;

class GuestShoppingCart implements ShoppingCartInterFace
{

    public function create() : ShoppingCart
    {
        return  ShoppingCart::create([
            "shopping_key"                  =>  $this->generateShoppingKey()
        ]);
    }

    public function findOrCreateShoppingCart($request) : ShoppingCart
    {
        if (getShoppingKey())
        {
            $shopping_cart = ShoppingCart::getCartByKey();

            if ($shopping_cart)
                return $shopping_cart;

            abort(422 , trans("messages.no_shopping_cart"));
        }

        return $this->create();
    }

    public function findShoppingCart(): ShoppingCart
    {
        $shopping_cart = ShoppingCart::getCartByKey();

        if (!$shopping_cart)
            abort(422 ,  trans("messages.no_shopping_cart"));

        return $shopping_cart;
    }


    private function generateShoppingKey()
    {
        return ApiKey::setModel(ShoppingCart::class)->setApiKeyField("shopping_key")->generateKey();
    }
}
