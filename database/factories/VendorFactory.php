<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Key;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id"                   =>  $this->faker->randomElement( User::all()->pluck("id")->toArray() ) ,
            "company_name"              =>  $this->faker->company ,
            "city_id"                   =>  $this->faker->randomElement( City::all()->pluck("id")->toArray() ) ,
            "vendor_type"               =>  $this->faker->randomElement( VendorType::all()->pluck("id")->toArray() ),
        ];
    }
}
