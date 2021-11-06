<?php

namespace App\Http\Controllers;

use App\Filters\ItemFilter;
use App\Filters\ProductFilter ;
use App\Http\Resources\Item\ItemCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $service;

    public function __construct(ItemService $service)
    {
        $this->service = $service;
    }

    public function index(ItemFilter $filter)
    {
        return new ItemCollection( $this->service->showAll($filter) );
    }

    public function show(Item $item , ProductFilter $filter)
    {
        return new ProductResource( $item  ,$filter );
    }
}
