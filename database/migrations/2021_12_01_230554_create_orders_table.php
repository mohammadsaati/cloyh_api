<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("address_id");
            $table->integer("discount_id")->nullable();
            $table->integer("off_amount");
            $table->integer("amount");
            $table->timestamps();


            $table->foreign("user_id")->references("id")->on("users")
                    ->onDelete("restrict")
                    ->onUpdate("cascade");

            $table->foreign("address_id")->references("id")->on("customer_addresses")
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
        Schema::dropIfExists('orders');
    }
}
