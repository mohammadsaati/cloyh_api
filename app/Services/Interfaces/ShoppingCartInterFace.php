<?php

namespace App\Services\Interfaces;

use App\Models\ShoppingCart;

interface ShoppingCartInterFace
{
    public function findOrCreateShoppingCart($request) : ShoppingCart;

    public function create() : ShoppingCart;

    public function findShoppingCart() : ShoppingCart;
}
