<?php

 namespace App\Filters;

 use App\Filters\Filter;

 class VendorProductFilter extends Filter
{
     public function productIds($product_ids)
     {
            return $this->builder->whereIn("product_id" , $product_ids);
     }
}
