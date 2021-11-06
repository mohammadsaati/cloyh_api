<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    public static function InvalidPhone()
    {
        return new self( trans("messages.phone_number_error") );
    }

    public static function AuthError()
    {
        return new self( trans("messages.auth_error") );
    }

    public static function InvalidToken()
    {
        return new self( trans("messages.no_token") );
    }

    public static function BlockError()
    {
        return new self( trans("messages.block_error") );
    }

    public static function UserExists()
    {
        return new self( trans("messages.user_exists") );
    }

    public static function CodeExpiry()
    {
        return new self( trans("messages.code_expiry") );
    }

    public static function InvalidCode()
    {
        return new self( trans("messages.invalid_code") );
    }

    public static function CreateCode()
    {
        return new self( trans("messages.create_code") );
    }
}
