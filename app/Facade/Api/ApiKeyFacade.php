<?php

namespace App\Facade\Api;

use Illuminate\Support\Facades\Facade;

class ApiKeyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "ApiKey";
    }
}
