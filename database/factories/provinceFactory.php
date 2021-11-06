<?php

namespace Database\Factories;

use App\Models\province;
use Faker\Generator;
use Faker\Provider\el_CY\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class provinceFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = province::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "name"      =>  $this->faker->randomElement($this->getIranProvince()) ,
            "status"    =>  1
        ];
    }

    private function getIranProvince()
    {
        return [
          "استان آذربایجان شرقی" ,
          "استان آذربایجان غربی" ,
          "تهران",
          "زنجان",
          "اردبیل",
          "قزوین",
          "اصفهان",
          "کرمان",
        ];
    }
}
