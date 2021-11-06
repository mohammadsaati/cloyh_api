<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\Register;
use App\Http\Resources\Customer\CustomerResource;
use App\Services\Customer\AuthService;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service  = $authService;
    }

    public function register(Register $request)
    {
       $customer = $this->service->register($request->all());

       return new CustomerResource($customer);
    }

    public function login(LoginRequest $request)
    {
        $customer = $this->service->login($request->all());

        return new CustomerResource($customer);
    }
}
