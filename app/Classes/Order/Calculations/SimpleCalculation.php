<?php

namespace App\Classes\Order\Calculations;

use App\Classes\Order\BaseCalculation;
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

        foreach ($items as $item)
        {
            $product = Product::query()->where("id" , $item->product_id)->first();

            //Check product stock
            $product->checkQuantity($item->count);

            $product_price = $product->prices->first()->checkDisCount() * $item->count;

            $price = $price + $product_price;
        }

        $data["price"] = $price;

        return new CalculationResource($data);
    }

    public function calculationValidation(): array
    {
        return $this->validation();
    }
}
