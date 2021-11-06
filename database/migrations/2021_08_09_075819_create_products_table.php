<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id");
            $table->unsignedBigInteger("color_id")->nullable();
            $table->unsignedBigInteger("size_id")->nullable();
            $table->integer("stock")->default(0);
            $table->integer("shipping_price");
            $table->integer("status")->default(1)->comment("1 active | 0 deActive");
            $table->timestamps();


            $table->foreign("item_id")->on("items")->references("id")
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
        Schema::dropIfExists('products');
    }
}
