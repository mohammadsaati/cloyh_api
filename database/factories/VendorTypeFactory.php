<?php

namespace Database\Factories;

use App\Models\VendorType;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"              =>  $this->faker->companySuffix ,
            "status"            =>  1
        ];
    }



}
