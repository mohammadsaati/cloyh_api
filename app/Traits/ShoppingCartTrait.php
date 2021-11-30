<?php

namespace App\Traits;

use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;

trait ShoppingCartTrait
{
    protected function createNewItem(ShoppingCart $shoppingCart , $item)
    {
        return ShoppingCartItem::create([
            "shopping_cart_id"          =>  $shoppingCart->id ,
            "product_id"                =>  $item["product_id"] ,
            "count"                     =>  $item["count"]
        ]);
    }

    protected function addItemToShoppingCart(ShoppingCart $shoppingCart , $item)
    {
        if (!$this->checkItemExists($shoppingCart , $item["product_id"]))
        {

            $this->createNewItem($shoppingCart , $item);

        } else {

            $this->updateItemQuantity($shoppingCart , $item);

        }

    }


    protected function addMultiItems(ShoppingCart $shoppingCart , $items)
    {
        foreach ($items as $item)
        {
            if (!$this->checkItemExists($shoppingCart , $item))
            {
                $this->createNewItem($shoppingCart , $item);
            } else {
                $this->updateItemQuantity($shoppingCart , $item);
            }

        }

    }

    protected function checkItemExists(ShoppingCart $shoppingCart , $product_id) : bool
    {
        return (bool) $shoppingCart->items->contains("product_id" , $product_id);
    }

    protected function updateItemQuantity(ShoppingCart $shoppingCart , $item)
    {
        ShoppingCartItem::query()->where([

            ["shopping_cart_id" , $shoppingCart->id] ,

            ["product_id"       , $item["product_id"]]

        ])->update([
            "count"         =>  $item["count"]
        ]);
    }

}
