<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::all()->pluck("id")->toArray();
        $categories = array_merge($categories , [null]);

        $products = Product::all()->pluck("id")->toArray();
        $products = array_merge( $products , [null] );

        return [
            "image"             =>  substr( $this->faker->uuid , 0 , 6 ).".jpg" ,
            "type"              =>  $this->faker->randomElement([1,2,3]) ,
            "category_id"       =>  $this->faker->randomElement( $categories ) ,
            "product_id"        =>  $this->faker->randomElement( $products ) ,
            "link"              =>  "https://www.clowndone.com" ,
            "status"            =>  $this->faker->randomElement([0,1,2])
        ];
    }
}
