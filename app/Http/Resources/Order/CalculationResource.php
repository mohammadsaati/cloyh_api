<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class CalculationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "final_price"               =>  (int)$this->resource["final_price"] ,
            "price"                     =>  (int)$this->resource["price"] ,
            "shipping"                  =>  (int)$this->resource["shipping"]
        ];
    }
}
