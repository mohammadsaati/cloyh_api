<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Section;
use App\Models\SectionImages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SectionImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SectionImages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "section_id"        =>  $this->faker->randomElement( Section::all()->pluck("id")->toArray() ) ,
            "image"             =>  Str::random(5)."_".time().".jpg"
        ];
    }
}
