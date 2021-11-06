<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemSection;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "item_id"           =>  $this->faker->randomElement( Item::all()->pluck("id")->toArray() ) ,
            "section_id"        =>  $this->faker->randomElement( Section::all()->pluck("id")->toArray() ) ,
        ];
    }
}
