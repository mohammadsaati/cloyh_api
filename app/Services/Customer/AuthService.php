<?php

 namespace App\Services\Customer;

 use App\Exceptions\AuthException;
 use App\Models\ActivationCode;
 use App\Models\Customer;
 use App\Services\Service;
 use App\Traits\Login;
 use App\Traits\Register;
 use Carbon\Carbon;

 class AuthService extends Service
{
    use Login , Register;

    private $customer;

 	public function model()
	{
        $this->model = Customer::class;
	}

    /***********************************************
     * ******** overwrite register trait ***********
     ***********************************************/
    public function extraSave()
    {
        $this->customer = $this->model::query()->create([
            "user_id"           =>  $this->user["id"]
        ]);

        $this->createActivationCode();
    }
     /***********************************************
      * ******** overwrite register trait ***********
      ***********************************************/



     /***********************************************
      * ******** overwrite login trait **************
      ***********************************************/

     protected function loginPermission()
     {
         $activation_code = $this->user->customer->activationCodes()->orderBy("id" , "DESC")->first();

        $this->checkActivationCode($activation_code);
     }

     /***********************************************
      * ******** overwrite login trait **************
      ***********************************************/

    private function createActivationCode()
    {
        if ($this->customer)
        {
            ActivationCode::create([
                "customer_id"               =>  $this->customer->id ,
                "is_used"                   =>  0 ,
                "expiry_time"               =>  Carbon::now()->addMinutes(10) ,
                "code"                      =>  rand(100 , 9999)
            ]);
        }
    }

    private function checkActivationCode($code)
    {
        if (empty($code))
        {
            throw AuthException::CreateCode();
        }

        if ($this->logged_in_date["activation-code"] != $code->code)
        {
            throw AuthException::InvalidCode();
        }

        $this->checkActivationCodeExpiry($code);

    }

    private function checkActivationCodeExpiry($code)
    {
        $now = Carbon::now();


        if ($now->diffInMinutes( Carbon::parse($code->expiry_time) ) > 10)
        {
            throw AuthException::CodeExpiry();
        }

        $code->update([
            "is_used"       =>  1
        ]);

    }

 }
