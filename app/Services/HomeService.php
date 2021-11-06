<?php

 namespace App\Services;

 use App\Models\Banner;
 use App\Models\Category;
 use App\Models\Option;
 use App\Models\Section;
 use App\Models\Slider;
 use App\Services\Service;

 class HomeService extends Service
{

 	public function model()
	{

	}

     public function home($filters = []): array
     {
         $data["sliders"]           =   Slider::all();
         $data["banners"]           =   Banner::all();
         $data["sections"]          =   Section::all();
         $data["menu"]              =   Category::Menu()->get();
         $data["options"]           =   Option::all();

         return $data;
     }
 }
