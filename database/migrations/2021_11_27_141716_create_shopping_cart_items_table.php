<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("shopping_cart_id");
            $table->unsignedBigInteger("product_id")->index();
            $table->integer("count");
            $table->timestamps();

            $table->foreign("shopping_cart_id")->references("id")->on("shopping_carts")
                ->onDelete("restrict")
                ->onUpdate("cascade");

            $table->foreign("product_id")->references("id")->on("products")
                ->onDelete("restrict")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart_items');
    }
}
