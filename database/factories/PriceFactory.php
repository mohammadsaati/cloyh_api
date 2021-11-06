<?php

namespace Database\Factories;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "product_id"    =>   $this->faker->randomElement( Product::all()->pluck("id")->toArray() ),
            "after"         =>  $this->faker->numberBetween(1000 , 1000000) ,
            "before"        =>  $this->faker->numberBetween(50000 , 3000000) ,
            "status"        =>  $this->faker->randomElement([1 , 0]) ,
        ];
    }
}
