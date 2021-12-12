<?php

 namespace App\Services;

 use App\Models\Category;
 use App\Services\Service;

 class CategoryService extends Service
{

 	public function model()
	{
        $this->model = Category::class;
	}


     public static function getSimilarItems(Category $category , $current_item_id)
     {
         return $category->items()->where("id" , "!=" , $current_item_id)->limit(20);
     }
 }
