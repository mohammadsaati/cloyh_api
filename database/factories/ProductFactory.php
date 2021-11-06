<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Vendor;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "item_id"           =>  $this->faker->randomElement( Item::all()->pluck("id")->toArray() ) ,
            "color_id"          =>  $this->faker->randomElement( Color::all()->pluck("id")->toArray() ) ,
            "size_id"           =>  $this->faker->randomElement( Size::all()->pluck("id")->toArray() ) ,
            "stock"             =>  $this->faker->randomNumber() ,
            "shipping_price"    =>  $this->faker->numberBetween(10000 , 50000) ,
            "status"            =>  $this->faker->randomElement( [ 0 , 1 , 2 ] ) ,
        ];
    }
}
