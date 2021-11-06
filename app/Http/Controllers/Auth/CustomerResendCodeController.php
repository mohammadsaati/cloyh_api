<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\ResendCodeRequest;
use App\Services\Customer\ResendCode;
use Illuminate\Http\Request;

class CustomerResendCodeController extends Controller
{
    private $service;

    public function __construct(ResendCode $resendCode)
    {
        $this->service = $resendCode;
        $this->middleware("throttle:60,1");
    }

    public function resendCode(ResendCodeRequest $request)
    {
        return $this->service->resend($request->all());
    }
}
