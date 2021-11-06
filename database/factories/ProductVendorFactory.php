<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVendor;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVendor::class;

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
