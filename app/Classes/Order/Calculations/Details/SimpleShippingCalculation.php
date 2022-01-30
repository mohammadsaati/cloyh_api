<?php

namespace App\Classes\Order\Calculations\Details;

use App\Classes\Order\CostInterFace;

class SimpleShippingCalculation extends CalculationDecorator
{

    public function __construct(CostInterFace $cost)
    {
        parent::__construct($cost);
    }

    public function doCalculation() : int
    {
        return 50000 + parent::doCalculation();
    }

    public function getShippingPrice()
    {
        return 50000;
    }

}
