<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\City;
use App\Models\Color;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Item;
use App\Models\ItemSection;
use App\Models\Option;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductVendor;
use App\Models\Province;
use App\Models\Section;
use App\Models\SectionImages;
use App\Models\Size;
use App\Models\Slider;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorProduct;
use App\Models\VendorType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Customer::factory(40)->create();
        VendorType::factory(3)->create();
        Province::factory(10)->create();
        City::factory(10)->create();
        Vendor::factory(30)->create();
        Color::factory(20)->create();
        Size::factory(20)->create();
        Category::factory(20)->create();
        Category::factory(10)->create();
        CategoryType::factory(10)->create();
        Item::factory(80)->create();
        Product::factory(80)->create();
        VendorProduct::factory(80)->create();
        Slider::factory(20)->create();
        Banner::factory(20)->create();

        Price::factory(80)->create();
        Section::factory(10)->create();
        SectionImages::factory(20)->create();

        CustomerAddress::factory(30)->create();

        ItemSection::factory(10)->create();

        Option::factory(2)->create();


    }
}
