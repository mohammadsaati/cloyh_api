<?php

namespace App\Rules\Order;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class ItemCountRule implements Rule
{
    private $items;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $collected_items = collect($this->items);

        $get_products = Product::query()->whereIn( "id" , $collected_items->pluck("product_id")->toArray() )->get("");


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans("messages.no_stock");
    }
}
