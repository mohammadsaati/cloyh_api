<?php


use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\CustomerResendCodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Order\CalculationController;
use App\Http\Controllers\Product\VendorProductController;
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

    Route::group(["prefix" => "product"] , function () {
        Route::get("{item:slug}/vendor/{vendor}"                , [VendorProductController::class           ,   "show"])->name("product.by_vendor");
    });

    Route::group(["prefix" => "shopping_cart"] , function () {
        Route::post("add"                                       ,[ShoppingCartController::class             ,   "addOrUpdate"])->name("shoppingCart.add");
        Route::get("get"                                        ,[ShoppingCartController::class             ,   "show"])->name("shoppingCart.show");
    });

    Route::group(["prefix" => "order"] , function () {
        Route::post("calculation"                                 , [CalculationController::class              , "calculation"])->name("order.calculation");
    });

    Route::group(["prefix" => "category"] , function () {
        Route::get("items/{category:slug}"                       , [CategoryController::class                 , "show"        ])->name("category.items");
    });

});

/*
 * These are some routs can use guest token or api-key
 */


