<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;

use App\Services\Order\OrderCalculationService;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    private $service;

    public function __construct(OrderCalculationService $service)
    {
        $this->service = $service;
    }

    public function calculation()
    {

    }
}
