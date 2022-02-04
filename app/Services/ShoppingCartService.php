<?php

 namespace App\Services;

 use App\Classes\ShoppingCart\CustomerShoppingCart;
 use App\Classes\ShoppingCart\GuestShoppingCart;
 use App\Models\ShoppingCart;
 use App\Services\Interfaces\ShoppingCartInterFace;
 use App\Services\Service;
 use App\Traits\ShoppingCartTrait;
 use phpDocumentor\Reflection\Types\This;

 class ShoppingCartService extends Service
{

    use ShoppingCartTrait;

 	public function model()
	{
        return ShoppingCart::class;
	}

     public function findOrCreateShoppingCart(ShoppingCartInterFace $cartInterFace , $request) : ShoppingCart
     {
         return $cartInterFace->findOrCreateShoppingCart($request);
     }

     public function createNewShoppingCart( ShoppingCartInterFace $cartInterFace , $request )
     {
            return $cartInterFace->store($request);
     }

     public function getShoppingCart() : ShoppingCart
     {
         $choose_cart = getToken() ? new CustomerShoppingCart() : new GuestShoppingCart();

         return self::FindShoppingCart($choose_cart);
     }

     public function addOrdUpdate($request)
     {
         $choose_cart = getToken() ? new CustomerShoppingCart() : new GuestShoppingCart();

         $cart = $this->findOrCreateShoppingCart($choose_cart , $request);

         $this->addItemToShoppingCart($cart , $request);
     }

     /**********************************
      * ********* Static ***************
      *********************************/

     public static function FindShoppingCart( ShoppingCartInterFace $cartInterFace) : ShoppingCart
     {
         return $cartInterFace->findShoppingCart();
     }

     public static function cleanShoppingCartAfterOrder()
     {
         self::deleteCartItems( getShoppingCartClass()->findShoppingCart() );
     }

     /**********************************
      * ********* Static ***************
      *********************************/
 }
