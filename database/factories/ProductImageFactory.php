<?php

namespace Database\Factories;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "product_id"            =>  $this->faker->randomElement( Product::all()->pluck("id")->toArray() ) ,
            "image"                 =>  substr( $this->faker->uuid , 0 , 10 ).".jpg" ,
        ];
    }
}
