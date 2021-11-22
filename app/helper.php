<?php

if (!function_exists("getToken"))
{
    function getToken()
    {
        return request()->header("Authentication");
    }
}

if (!function_exists("response_as_json"))
{
    function response_as_json($data , $code = 200)
    {
        return response()->json([
            "message"       =>  $data
        ] , $code);
    }
}

if (!function_exists("imageGenerate"))
{
    function imageGenerate($folder , $image)
    {
        return env("APP_IP" , "localhost:8000")."/storage/public/".$folder."/".$image;
    }
}
