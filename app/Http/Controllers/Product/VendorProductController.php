<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\VendorProductCollection;
use App\Models\Item;
use App\Models\Vendor;
use App\Services\VendorProductService;
use Illuminate\Http\Request;

class VendorProductController extends Controller
{
    private $service;

    public function __construct(VendorProductService $service)
    {
        $this->service = $service;
    }

    public function show(Item $item , Vendor $vendor)
    {
        return new VendorProductCollection( $this->service->show($item , $vendor) );
    }
}
