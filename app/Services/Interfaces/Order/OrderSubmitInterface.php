<?php

namespace App\Services\Interfaces\Order;

interface OrderSubmitInterface
{
    public function submitValidation() : array;

    public function submit( $data );
}
