<?php


use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\CustomerResendCodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Order\CalculationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Product\VendorProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SplashController;
use Illuminate\Support\Facades\Route;

Route::post("register"                                          , [CustomerAuthController::class              , "register"            ])->name("customer.register");
Route::post("login"                                             , [CustomerAuthController::class              , "login"               ])->name("customer.login");
Route::post("resend-code"                                       , [CustomerResendCodeController::class        , "resendCode"          ])->name("customer.resend");

Route::group(["middleware" => "apiAuth" , "prefix" => "v1"] , function () {

    Route::get("/home"                                          , [HomeController::class                       ,   "home"      ]);
    Route::get("/splash"                                        , [SplashController::class                     ,   "splash"    ]);

    Route::get("address"                                        ,  [CustomerAddressController::class           ,    "index"     ]);

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
        Route::get("/"                                           , [OrderController::class                    , "index"       ])->name("order.index");
        Route::get("show/{order}"                                 , [OrderController::class                    , "show"       ])->name("order.show");
        Route::post("calculation"                                 , [CalculationController::class              , "calculation"])->name("order.calculation");
        Route::post("submit"                                      , [OrderController::class                    , "submit"     ])->name("order.submit");
    });

    Route::group(["prefix" => "category"] , function () {
        Route::get("items/{category:slug}"                       , [CategoryController::class                 , "show"        ])->name("category.items");
    });

    Route::post("/search"                                          , [SearchController::class                       , "search"  ])->name("customer.search");

});

/*
 * These are some routs can use guest token or api-key
 */


