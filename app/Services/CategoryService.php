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

 }
