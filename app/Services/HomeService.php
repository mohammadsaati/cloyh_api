<?php

 namespace App\Services;

 use App\Models\Banner;
 use App\Models\Category;
 use App\Models\Option;
 use App\Models\Section;
 use App\Models\Slider;
 use App\Services\Service;
 use Carbon\Carbon;

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

     public function splash( $filter = [] ) : array
     {
         $customer_info = "";
         if (request()->get("user"))
         {
             $user = request()->get("user");
             $customer_info = [
                 "id"               =>  $user->customer->id ,
                 "api_key"          =>  $user->api_key ,
                 "first_name"       =>  $user->first_name ,
                 "last_name"        =>  $user->last_name ,
                 "city_id"          =>  $user->customer->city_id ?? 0 ,
                 "city_name"        =>  $user->customer->city ? $user->customer->city->name : ""
             ];
         }
         return [
             "today"                        =>  Carbon::now()->toDateTimeString() ,
             "customer_info"                =>  $customer_info
         ];
     }
 }
