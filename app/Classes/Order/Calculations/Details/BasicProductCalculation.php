<?php

namespace App\Classes\Order\Calculations\Details;

use App\Classes\Order\CostInterFace;
use App\Models\Product;

class BasicProductCalculation implements CostInterFace
{
    private $products = [];

    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }


    public function doCalculation(): int
    {
        $final_price = 0;

        foreach ($this->products as $product)
        {
            $current_product = Product::query()->where("id" , $product->product_id)->first();

            //Check product stock
            $current_product->checkQuantity($product->count);
            $current_product_prices = $current_product->prices->first();

            $product_price = $current_product_prices ? ($current_product_prices->checkDisCount()) * $product->count : 0;

            $final_price = $final_price + $product_price;
        }

        return $final_price;
    }
}
