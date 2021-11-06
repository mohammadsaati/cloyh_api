<?php

namespace Database\Factories;

use App\Models\ActivationCode;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivationCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActivationCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "customer_id"           =>  $this->faker->randomElement( Customer::all()->pluck("id")->toArray() ) ,
            "code"                  =>  $this->faker->numberBetween(500 , 10000) ,
            "expiry_time"           =>  $this->faker->dateTime ,
            "is_used"               =>  $this->faker->randomElement([0, 1])  ,
        ];
    }
}
