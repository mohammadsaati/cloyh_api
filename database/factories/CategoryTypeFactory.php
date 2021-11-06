<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryType;
use App\Models\Model;
use App\Models\VendorType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "category_id"               =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "vendor_type_id"            =>  $this->faker->randomElement( VendorType::all()->pluck("id")->toArray() ) ,
            "status"                    =>  $this->faker->randomElement( [ 0 , 1 ] )
        ];
    }
}
