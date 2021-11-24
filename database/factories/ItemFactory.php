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
            "image"             =>  $this->faker->randomElement( $this->chooseExistImage() ) ,
            "description"       =>  $this->faker->sentence ,
            "category_id"       =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
//            "banner_id"         =>  $this->faker->randomElement( Banner::all()->pluck("id")->toArray() ) ,
            "status"            =>  $this->faker->randomElement([0,1,2]) ,

        ];
    }

    private function chooseExistImage() : array
    {
        return [
            "cloth1.jpg" ,
            "cloth2.jpg" ,
            "cloth3.jpg" ,
            "cloth4.jpg" ,
            "cloth5.jpg" ,
            "cloth6.jpg" ,
            "cloth7.jpg" ,
            "cloth8.jpg" ,
            "cloth9.jpg" ,
            "cloth10.jpg" ,
        ];
    }

}
