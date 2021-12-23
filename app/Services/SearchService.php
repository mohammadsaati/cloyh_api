<?php

 namespace App\Services;

 use App\Models\Category;
 use App\Models\Color;
 use App\Models\Item;
 use App\Models\Size;
 use App\Services\Service;

 class SearchService extends Service
{
    private $colors = [];
    private $sizes = [];

 	public function model()
	{

	}

     public function search($filters = [])
     {
         $category_ids = $filters->request["category_ids"]??[];

         $categories = Category::query()->whereIn("id" , $category_ids)->get();

         $this->getColorsAndSizes($category_ids);

         return [
            "category_ids"          =>  $category_ids ,
             "color_ids"            =>  $filters->request["color_ids"]??[] ,
             "categories"           =>  $categories ,
             "sub_categories"       =>  Category::query()->whereIn("parent_id" , $category_ids)->get() ,
             "items"                =>  Item::query()->filter($filters)->paginate($this->pagination) ,
             "colors"               =>  $this->colors ,
             "sizes"                =>  $this->sizes
         ];
     }

     private function getColorsAndSizes($categories)
     {
         $color_ids = [];
         $size_ids = [];


         $item_products = Item::FindWithCategories($categories)->with("products")->get()->pluck("products");

          foreach ($item_products as $items)
          {
              foreach ($items as $item)
              {
                  $color_ids[] = $item["color_id"];
                  $size_ids[]  = $item["size_id"];
              }
          }


         $this->colors =  Color::query()->whereIn("id" , $color_ids)->get();
         $this->sizes = Size::query()->whereIn("id" , $size_ids)->get();
     }

 }
