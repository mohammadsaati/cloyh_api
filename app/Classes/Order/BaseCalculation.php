<?php

namespace App\Classes\Order;

use App\Classes\ShoppingCart\CustomerShoppingCart;
use App\Classes\ShoppingCart\GuestShoppingCart;
use App\Models\Product;
use App\Models\ShoppingCartItem;
use App\Services\ShoppingCartService;

class BaseCalculation
{
    protected $items;

    protected function validation() : array
    {
       return [];
    }

    protected function getitems()
    {
        $choose_cart = getToken() ? new CustomerShoppingCart() : new GuestShoppingCart();

        $this->items = ShoppingCartService::FindShoppingCart($choose_cart);

        return $this->items->items();
    }

}
