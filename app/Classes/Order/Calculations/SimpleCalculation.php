<?php

namespace App\Classes\Order\Calculations;

use App\Classes\Order\BaseCalculation;
use App\Classes\Order\Calculations\Details\BasicProductCalculation;
use App\Classes\Order\Calculations\Details\SimpleShippingCalculation;
use App\Http\Resources\Order\CalculationResource;
use App\Models\Product;
use App\Services\Interfaces\Order\CalculationInterFace;
use phpDocumentor\Reflection\Types\Parent_;

class SimpleCalculation extends BaseCalculation implements CalculationInterFace
{

    public function calculation($request)
    {
        $items = $this->getitems()->get();

        $data = [];
        $price = 0;

       $product_calc = new BasicProductCalculation($items);

       $product_price = $product_calc->doCalculation();

       $shipping_cost = new SimpleShippingCalculation($product_calc);

       $price = $shipping_cost->doCalculation();

        $data["final_price"] = $price;
        $data["price"] = $product_price;
        $data["shipping"] = $shipping_cost->getShippingPrice();

        return new CalculationResource($data);
    }

    public function calculationValidation(): array
    {
        return $this->validation();
    }
}
