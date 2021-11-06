<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"              =>  $this->faker->words(4 , true) ,
            "code"              =>  $this->faker->unique()->numberBetween(500 , 2000000) ,
            "slug"              =>  $this->faker->unique()->slug ,
            "image"             =>  Str::random(6).".jpg" ,
            "description"       =>  $this->faker->sentence ,
            "category_id"       =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
//            "banner_id"         =>  $this->faker->randomElement( Banner::all()->pluck("id")->toArray() ) ,
            "status"            =>  $this->faker->randomElement([0,1,2]) ,

        ];
    }
}
