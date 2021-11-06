<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = "customer";

    public function toArray($request)
    {
        return [
            "id"                    =>  $this->id ,
            "first_name"            =>  $this->first_name  ,
            "last_name"             =>  $this->last_name ,
            "api_key"               =>  $this->api_key ,
            "phone_number"          =>  $this->phone_number ,
        ];
    }
}
