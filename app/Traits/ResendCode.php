<?php

namespace App\Traits;

use App\Exceptions\AuthException;
use App\Models\User;

trait ResendCode
{
    protected $resend_code_user;
    protected $base_model = User::class;
    private $resend_code_data;

    public function resendCode($data)
    {
        $this->resend_code_data = $data;

        try {

        } catch (AuthException $exception) {
            abort(401 , $exception->getMessage());
        }

    }


}
