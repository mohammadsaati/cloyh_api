<?php

namespace App\Http\Resources\Vendor;

use App\Http\Resources\Product\VendorProductCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductVendorCollection extends ResourceCollection
{
    private $item_id;

    public function __construct($resource , $item_id)
    {
        parent::__construct($resource);
        $this->item_id = $item_id;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return $this->collection->map(function ($vendor) {


            return [
                "id"                    =>  $vendor->vendor_id ,
                "first_name"            =>  $vendor->vendor->user->first_name ,
                "last_name"             =>  $vendor->vendor->user->last_name  ,
                "phone_number"          =>  $vendor->vendor->user->phone_number  ,
                "company_name"          =>  $vendor->vendor->company_name ,
                "products"              =>  new VendorProductCollection( $vendor->vendor->products()->where("item_id", $this->item_id)->get() )
            ];
        });
    }
}
