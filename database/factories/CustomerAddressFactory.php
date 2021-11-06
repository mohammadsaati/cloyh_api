<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "customer_id"                   =>  $this->faker->randomElement( Customer::all()->pluck("id")->toArray() ) ,
            "province_id"                   =>  $this->faker->randomElement( Province::all()->pluck("id")->toArray() ) ,
            "city_id"                       =>  $this->faker->randomElement( City::all()->pluck("id")->toArray() ) ,
            "full_address"                  =>  $this->faker->address ,
            "phone_number"                  =>  $this->faker->phoneNumber ,
            "recipient_name"                =>  $this->faker->name ,
            "recipient_national_code"       =>  $this->faker->numberBetween(500 , 2000000)
        ];
    }
}
