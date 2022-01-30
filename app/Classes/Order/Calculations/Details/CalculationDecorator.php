<?php

namespace App\Classes\Order\Calculations\Details;

use App\Classes\Order\CostInterFace;

class CalculationDecorator implements CostInterFace
{
    private $cost;

    public function __construct(CostInterFace $cost)
    {
        $this->cost = $cost;
    }

    public function doCalculation(): int
    {
        return $this->cost->doCalculation();
    }
}
