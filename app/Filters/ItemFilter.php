<?php

 namespace App\Filters;

 use App\Filters\Filter;
 use function PHPUnit\Framework\isEmpty;

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

     public function category_ids($ids)
     {
         if (!isEmpty($ids))
         {
             return $this->builder->whereIn("category_id" , $ids);
         }
         return $this->builder;
     }


 }
