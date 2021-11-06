<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use ApiKey;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "first_name"            =>  $this->faker->name ,
            "last_name"             =>  $this->faker->lastName ,
            "phone_number"          =>  $this->faker->phoneNumber ,
            "status"                =>  $this->faker->randomElement([0 , 1]) ,
            "user_type"             =>  $this->faker->randomElement([1,2,3]) ,
            "password"              =>  Hash::make(123456789) ,
            "api_key"               =>  ApiKey::setModel($this->model)->generateKey() ,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
