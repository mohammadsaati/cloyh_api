<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id"       =>  $this->faker->randomElement( User::all()->pluck("id")->toArray() ) ,
            "name"          =>  $this->faker->sentence(7) ,
            "parent_id"     =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "priority"      =>  $this->faker->randomDigitNotZero() ,
            "slug"          =>  $this->faker->slug ,
            "image"         =>  substr($this->faker->uuid , 0 , 5)."jpg" ,
            "status"        =>  $this->faker->randomElement( [0 , 1 , 2] )

        ];
    }
}
