<?php

namespace App\Http\Controllers;

use App\Http\Resources\Customer\AddressCollection;
use App\Services\AddressService;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    private $service;

    public function __construct(AddressService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return new AddressCollection( $this->service->showAddress() );
    }
}
