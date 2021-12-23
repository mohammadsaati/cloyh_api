<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->integer("count");
            $table->integer("off_price")->nullable();
            $table->integer("total_price");
            $table->timestamps();

            $table->foreign("order_id")->references("id")->on("orders")
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
        Schema::dropIfExists('order_items');
    }
}
