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
    use ShoppingCartTrait;

    public function store($request)
    {


        $shopping_cart_item = ShoppingCartItem::create([
            "cart_id"           =>  $created_cart ,
            "product_id"        =>  $request["product_id"] ,
            "count"             =>  $request["count"]
        ]);

        return new ShoppingCartResource($created_cart);
    }

    public function addItem($request)
    {
        if ( getShoppingKey() )
        {
            $this->update( $request );
        }

        $this->store($request);
    }

    public function update($request)
    {
        $cart = ShoppingCart::getCartByKey();
        if (!$cart)
        {
            abort(422 , trans("messages.no_shopping_cart"));
        }

        $cart->items()->updateOrCreate($request["items"]);
    }

    public function fetch()
    {
        // TODO: Implement fetch() method.
    }

    private function createNewCart() : ShoppingCart
    {
        return ShoppingCart::create([
            "shopping_key"      =>  $this->generateShoppingKey()
        ]);
    }



    private function generateShoppingKey()
    {
        return ApiKey::setModel(ShoppingCart::class)->setApiKeyField("shopping_key")->generateKey();
    }
}
