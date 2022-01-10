<?php

namespace App\Classes\Order\Submit;

use App\Classes\Order\BasicOrder;
use App\Classes\Order\Calculations\SimpleCalculation;
use App\Models\Order;
use App\Services\Interfaces\Order\OrderSubmitInterface;
use App\Services\Order\OrderCalculationService;
use Illuminate\Support\Facades\DB;

class SimpleOrder extends BasicOrder implements OrderSubmitInterface
{

    public function submit( $data )
    {
        $calculated_data = OrderCalculationService::StaticCalculation(new SimpleCalculation() , $data);

        $this->getitems();

        DB::transaction(function () use ($data , $calculated_data){

            $order_item_data = [];

            $created_order = Order::create([
                "user_id"           =>  request()->get("user")->customer->id,
                "address_id"        =>  $data["address_id"] ,
                "off_amount"        =>  0 ,
                "amount"            =>  $calculated_data["price"]
            ]);

            $order_item_data["order_id"]        =   $created_order->id;

            $this->saveOrderItems($order_item_data);
        });


    }

    public function submitValidation(): array
    {
        return [];
    }

}
