<?php


use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\CustomerResendCodeController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;

Route::post("register"                                          , [CustomerAuthController::class              , "register"            ])->name("customer.register");
Route::post("login"                                             , [CustomerAuthController::class              , "login"               ])->name("customer.login");
Route::post("resend-code"                                       , [CustomerResendCodeController::class        , "resendCode"          ])->name("customer.resend");

Route::group(["middleware" => "apiAuth" , "prefix" => "v1"] , function () {

    Route::get("/home"                                          , [HomeController::class                       ,   "home"      ]);

    //#products
    Route::resource("product"                                 , ItemController::class)->only("index" , "show")
        ->parameter("product" , "item")
        ->scoped([
              "item"      =>  "slug"
        ]);

    // #Sections
    Route::resource("section"                                 , SectionController::class)->only("show")
                    ->scoped([
                        "section"       =>  "slug"
                    ]);

    Route::group(["prefix" => "shopping_cart"] , function () {
        Route::post("add"                                       ,[ShoppingCartController::class             ,   "addOrUpdate"])->name("shoppingCart.add");
    });

});
