<?php

 namespace App\Services\Customer;

 use App\Models\ActivationCode;
 use App\Models\Customer;
 use App\Services\Service;
 use App\Traits\CheckMobile;
 use Carbon\Carbon;

 class ResendCode extends Service
{

    use CheckMobile;

 	public function model()
	{
        $this->model = Customer::class;
	}

     public function resend($data)
     {
        $this->checkPhoneNumber($data);

         try {

             $this->createActivationCode();
             return  response_as_json([
                 "title"        =>  "ارسال کد فعال سازی" ,
                 "success"      =>  "کد فعال سازی با موفقیت ارسال شد"
             ]);

         } catch (\Exception $exception) {
             return response_as_json([
                 "title"        =>  "مشکل سرور" ,
                 "errors"       =>  [
                     "مشکلی در درست کردن کد فعال سازی رخ داده است لطفا بعدا امتحان کنید"
                 ]
             ] , 500);

         }
     }

     private function createActivationCode()
     {
         if ($this->user)
         {
             ActivationCode::create([
                 "customer_id"               =>  $this->user->customer->id ,
                 "is_used"                   =>  0 ,
                 "expiry_time"               =>  Carbon::now()->addMinutes(10) ,
                 "code"                      =>  rand(100 , 9999) + rand(999 , 99999)
             ]);
         }
     }

 }
