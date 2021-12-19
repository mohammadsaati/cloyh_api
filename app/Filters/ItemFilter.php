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

     public function category_ids($ids)
     {
         if (!empty($ids))
         {
             return $this->builder->whereIn("category_id" , $ids);
         }
         return $this->builder;
     }

     public function color_ids($ids)
     {
         if (!empty($ids))
         {
             return $this->builder->whereHas("products" ,  function ($query) use ($ids) {
                 return $query->whereIn("color_id" , $ids);
             });
         }

         return $this->builder;
     }

     public function size_ids($ids)
     {
         if (!empty($ids))
         {
             return $this->builder->whereHas("products" ,  function ($query) use ($ids) {
                 return $query->whereIn("size_id" , $ids);
             });
         }

         return $this->builder;
     }


 }
