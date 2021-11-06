<?php

 namespace App\Filters;

 use App\Filters\Filter;

 class ItemFilter extends Filter
{
     public function name($name)
     {
         return $this->builder->where("name" , "LIKE" , "%".$name."%");
     }

     public function category($category)
     {
         return $this->builder->whereHas("category" , function ($query2) use ($category) {
             return $query2->where("name" , "LIKE" , "%".$category."%");
         });
     }


 }
