<?php

 namespace App\Filters;

 use App\Filters\Filter;

 class ProductFilter extends Filter
{
     public function color($color)
     {

         return $this->builder->whereHas("color" , function ($query_color) use ($color) {
             return $query_color->where("name" , "LIKE" , "%".$color."%");
         });
     }

     public function size($size)
     {
         return $this->builder->whereHas("size" , function ($query_size) use ($size) {
             return $query_size->where("value" , "LIKE" , "%".$size."%");
         });

     }
 }
