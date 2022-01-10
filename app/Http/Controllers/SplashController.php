<?php

namespace App\Http\Controllers;

use App\Http\Resources\SplahsResource;
use App\Services\HomeService;
use Illuminate\Http\Request;

class SplashController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function splash()
    {
        return new SplahsResource( $this->service->splash() );
    }

}
