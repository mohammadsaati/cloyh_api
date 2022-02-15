<?php

namespace App\Classes\Order;

use App\Classes\ShoppingCart\CustomerShoppingCart;
use App\Classes\ShoppingCart\GuestShoppingCart;
use App\Models\OrderItem;
use App\Models\Product;
use App\Rules\Order\CustomerAddressRule;
use App\Rules\Order\ItemCountRule;
use App\Services\ShoppingCartService;

class BasicOrder
{
    protected  $shopping_cart;
    protected  $shopping_cart_items;
    /*
     * These are some basic order and calculation validations
     */

    protected function customerAddressValidation() : array
    {
        return [
            "customer_address"      =>  ["required" , new CustomerAddressRule()]
        ];
    }

    protected function getitems()
    {
        $choose_cart = getShoppingCartClass();

        $this->shopping_cart = ShoppingCartService::FindShoppingCart($choose_cart);
        $this->shopping_cart_items = $this->shopping_cart->items();

        return $this->shopping_cart_items;
    }

    protected function extraOrderItemFields() : array
    {
        return [];
    }

    protected function saveOrderItems($data) : void
    {
        $get_items = $this->shopping_cart_items->get();

       foreach ($get_items as $item)
       {
           $product = Product::query()->where("id" , $item["product_id"])->first();
           $product_price = $product->prices->first();


           OrderItem::create([
               "order_id"               =>  $data["order_id"] ,
               "product_id"             =>  $item["product_id"] ,
               "count"                  =>  $item["count"] ,
               "off_price"              =>  null ,
               "total_price"            =>  (int)($product_price ? $product_price->checkDisCount() :  0 * $item["count"])
           ]);

          $product->update([
               "stock"          =>  (int)($product->stock - $item["count"])
           ]);
       }


    }


}
