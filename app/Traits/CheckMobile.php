<?php

namespace App\Traits;

use App\Exceptions\AuthException;
use App\Models\User;

trait CheckMobile
{
    protected $base_model = User::class;
    protected $user;

    public function checkPhoneNumber($data)
    {
        $this->user = $this->base_model::query()->where("phone_number" , $data["phone_number"])->first();

        if (!$this->user)
        {
            throw AuthException::InvalidPhone();
        }
    }
}
