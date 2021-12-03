<?php

namespace App\Classes\Order;

use App\Rules\Order\CustomerAddressRule;
use App\Rules\Order\ItemCountRule;

class BasicOrder
{
    /*
     * These are some basic order and calculation validations
     */

    protected function customerAddressValidation() : array
    {
        return [
            "customer_address"      =>  ["required" , new CustomerAddressRule()]
        ];
    }
}
