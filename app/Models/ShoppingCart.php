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
        return self::where("shopping_key" , getShoppingKey() )->first();
    }

    public static function getCartByCustomer()
    {
       return  self::where("customer_id" , request()->get("customer_id") )->first();
    }

    public static function findShoppingCart()
    {

    }


    /**************************************************
     * ************* Static functions *****************
     ***************************************************/

}
