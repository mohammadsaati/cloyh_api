<?php

namespace App\Http\Controllers\Order;

use App\Classes\Order\Calculations\SimpleCalculation;
use App\Http\Controllers\Controller;

use App\Http\Requests\Order\CalculationRequest;
use App\Services\Order\OrderCalculationService;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    private $service;

    public function __construct(OrderCalculationService $service)
    {
        $this->service = $service;
    }

    public function calculation(CalculationRequest $request)
    {
        return $this->service->calculation(new SimpleCalculation() , $request->all());
    }
}
