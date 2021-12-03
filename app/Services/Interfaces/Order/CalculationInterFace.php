<?php

namespace App\Services\Interfaces\Order;

interface CalculationInterFace
{
    public function calculation($request);

    public function calculationValidation() : array;
}
