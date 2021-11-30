<?php

namespace App\Services\Interfaces;

use App\Models\ShoppingCart;

interface ShoppingCartInterFace
{
    public function findShoppingCart($request) : ShoppingCart;

    public function create() : ShoppingCart;
}
