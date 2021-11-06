<?php

namespace App\Exceptions;

use Exception;

class ProductException extends Exception
{
    public static function NoProduct()
    {
        return new self( trans("messages.no_products") );
    }
}
