<?php

 namespace App\Services;

 use App\Models\Item;
 use App\Services\Service;

 class ItemService extends Service
{

 	public function model()
	{
        $this->model = Item::class;
	}

 }
