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

    public function findShoppingCart($request) : ShoppingCart
    {
        if (getShoppingKey())
        {
            return ShoppingCart::getCartByKey();
        }

        return $this->create();
    }


    private function generateShoppingKey()
    {
        return ApiKey::setModel(ShoppingCart::class)->setApiKeyField("shopping_key")->generateKey();
    }
}
