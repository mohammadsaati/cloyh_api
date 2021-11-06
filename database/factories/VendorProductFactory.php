<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "product_id"        =>  $this->faker->randomElement( Product::all()->pluck("id")->toArray() ) ,
            "vendor_id"         =>  $this->faker->randomElement( Vendor::all()->pluck("id")->toArray() ) ,
        ];
    }
}
