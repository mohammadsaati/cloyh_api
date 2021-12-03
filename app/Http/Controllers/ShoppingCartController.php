<?php

namespace App\Http\Controllers;


use App\Classes\ShoppingCart\CustomerShoppingCart;
use App\Classes\ShoppingCart\GuestShoppingCart;
use App\Http\Requests\ShoppingCart\AddItemRequest;
use App\Http\Resources\ShoppingCart\ShoppingCartResource;
use App\Services\ShoppingCartService;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    private $service;

    public function __construct(ShoppingCartService $service)
    {
        $this->service = $service;
    }

    public function addOrUpdate(AddItemRequest $request)
    {
        $this->service->addOrdUpdate($request->all());
    }

    public function show()
    {
        return new ShoppingCartResource( $this->service->getShoppingCart() );
    }
}
