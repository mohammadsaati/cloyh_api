<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->randomElement( $this->createValues()["name"] );
        $value = $this->createValues()["values"][$name];

        return [
            "name"      =>  $name ,
            "value"     =>  $value
        ];
    }

    private function createValues()
    {
        return [

            "name"        =>  [
                "address"    ,
                "phone_number"
            ] ,

            "values"      =>   [
                "address"               =>  $this->faker->address ,
                "phone_number"          =>  $this->faker->phoneNumber
            ]

        ];
    }
}
