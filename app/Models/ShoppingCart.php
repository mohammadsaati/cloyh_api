<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id"               ,       "shopping_key" ,
    ];

    public function items()
    {
        return $this->hasMany(ShoppingCartItem::class , "shopping_cart_id");
    }


    /**************************************************
     * ************* Static functions *****************
     ***************************************************/

    public static function getCartByKey()
    {
        $cart =  self::where("shopping_key" , getShoppingKey() )->first();

        if (!$cart)
            abort(422 , trans("messages.no_shopping_cart"));

        return $cart;
    }

    public static function getCartByCustomer()
    {
        $cart =  self::where("customer_id" , request()->get("customer_id") )->first();

        if (!$cart)
            abort(422 , trans("messages.no_shopping_cart"));

        return $cart;
    }

    public static function findShoppingCart()
    {

    }


    /**************************************************
     * ************* Static functions *****************
     ***************************************************/

}
