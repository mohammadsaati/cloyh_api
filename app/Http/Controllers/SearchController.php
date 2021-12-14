<?php

namespace App\Http\Controllers;

use App\Filters\ItemFilter;
use App\Http\Resources\Search\CategorySearchResource;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function search(ItemFilter $filter)
    {
        return new CategorySearchResource( $this->service->search($filter) , $filter );
    }
}
