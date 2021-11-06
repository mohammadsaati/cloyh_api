<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"         =>  $this->faker->words(10 , true) ,
            "priority"      =>  $this->faker->randomDigitNotNull ,
            "image"         =>  substr( $this->faker->uuid , 0 , 10 ).".jpg" ,
            "type"          =>  $this->faker->randomElement([1,2,3,4]) ,
            "product_id"    =>  $this->faker->randomElement( Product::all()->pluck("id")->toArray() ) ,
            "category_id"   =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "section_id"    =>  $this->faker->randomElement( [] ) ,
            "link"          =>  Str::random() ,
            "status"        =>  $this->faker->randomElement([1,2]) ,
        ];
    }
}
