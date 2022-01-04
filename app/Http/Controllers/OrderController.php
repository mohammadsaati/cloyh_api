<?php

namespace App\Http\Controllers;

use App\Classes\Order\Submit\SimpleOrder;
use App\Http\Resources\Order\CustomerOrderCollection;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return new CustomerOrderCollection( $this->service->showCustomerOrders() );
    }

    public function submit(Request $request)
    {
        $this->service->submitOrder(new SimpleOrder() ,$request->all());
    }
}
