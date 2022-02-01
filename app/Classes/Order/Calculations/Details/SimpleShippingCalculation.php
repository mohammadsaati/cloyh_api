<?php

namespace App\Classes\Order\Calculations\Details;

use App\Classes\Order\CostInterFace;
use App\Models\Product;

class SimpleShippingCalculation extends CalculationDecorator
{
    private $shipping_cost;
    private $products;

    public function __construct(CostInterFace $cost , $products)
    {
        parent::__construct($cost);
        $this->products = $products;
    }
    /**
     * @return mixed
     */
    public function getShippingCost()
    {
        return $this->shipping_cost;
    }

    public function doCalculation() : int
    {
        $this->shipping_cost = 0;

        foreach ($this->products as $product)
        {
            $current_product = Product::query()->where("id" , $product->product_id)->first();

            $this->shipping_cost = $this->shipping_cost + $current_product->shipping_price;
        }

        return $this->shipping_cost + parent::doCalculation();
    }

}
