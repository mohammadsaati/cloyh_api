<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function home(Request $request)
    {
        return new HomeResource( $this->service->home($request->all()) );
    }
}
