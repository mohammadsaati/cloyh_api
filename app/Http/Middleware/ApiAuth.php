<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthException;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = getToken();
        return $next($request);
        if (!$token)
        {
            abort(401 , AuthException::InvalidToken()->getMessage());
        }

        $user = User::query()->where("api_key" , $token)->first();
        if (!$user)
        {
            abort(401 , AuthException::InvalidToken()->getMessage());
        }

        if (!$user->status)
        {
            abort(401 , AuthException::BlockError()->getMessage());
        }


    }
}
