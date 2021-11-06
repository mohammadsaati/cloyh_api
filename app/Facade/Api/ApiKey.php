<?php

namespace App\Facade\Api;

use Illuminate\Support\Str;

class ApiKey
{
    private $model;

    protected $api_key_field = "api_key";
    protected $key_length = 60;
    protected $generated_token = "";
    protected $api_key = "";


    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function setApiKeyField($value)
    {
        $this->api_key_field = $value;
        return $this;
    }

    public function setLength($value)
    {
        $this->key_length = $value;
        return $this;
    }

    public function generateKey(): string
    {
        $random_word = Str::random(20);
        $random_uuid = Str::uuid();
        $last_random_word = Str::random(10);

        $this->generated_token = $random_word.time().$random_uuid.$last_random_word;

        $this->checkTokenLength();
        $this->checkUnique();

        return $this->api_key;

    }

    private function checkTokenLength()
    {
        $token_length = strlen($this->generated_token);
        $length = $this->key_length - $token_length;




        if ($length > 0)
            $this->generated_token = $this->generated_token.Str::random( $length );

        if ($length < 0)
            $this->generated_token = substr($this->generated_token , 0 , (int)$length);

    }


    private function checkUnique()
    {
        $find_key = $this->model::query()->where("$this->api_key_field" , $this->generated_token)->first();
        if ($find_key)
        {
            $this->generateKey();
        } else {
            $this->api_key = $this->generated_token;
        }
    }
}
