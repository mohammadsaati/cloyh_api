<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"          =>  $this->faker->title ,
            "slug"          =>  $this->faker->slug ,
            "bg_color"      =>  $this->faker->colorName ,
            "bg_image"      =>  Str::random(5)."_".time().".jpg" ,
            "status"        =>  $this->faker->randomElement([0 , 1])
        ];
    }
}
