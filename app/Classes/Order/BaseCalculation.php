<?php

namespace App\Classes\Order;

class BaseCalculation
{
    protected function validation() : array
    {
        return [
            "items"                     =>  ["required"] ,
            "items.*.product_id"        =>  "required|exists:products,id" ,
            "items.*.count"             =>  "required|number"
        ];
    }
}
