<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"                  =>  $this->faker->randomElement( $this->getRandomCity() ) ,
            "province_id"           =>  Province::factory() ,
            "slug"                  =>  $this->faker->slug(6) ,
            "status"                =>  1
        ];
    }

    private function getRandomCity()
    {
        return [
           "تبریز" ,
           "ارومیه" ,
           "مشهد" ,
           "رشت" ,
           "دماوند" ,
           "کیش" ,
           "بندرعباس" ,
        ];
    }
}
