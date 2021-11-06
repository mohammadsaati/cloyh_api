<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("province_id");
            $table->unsignedBigInteger("city_id");
            $table->text("full_address");
            $table->string("phone_number")->nullable();
            $table->string("recipient_name")->nullable();
            $table->string("recipient_national_code")->nullable();
            $table->timestamps();

            $table->foreign("customer_id")->on("customers")->references("id")
                ->onDelete("cascade")
                ->onUpdate("cascade");


            $table->foreign("province_id")->on("provinces")->references("id")
                ->onDelete("cascade")
                ->onUpdate("cascade");


            $table->foreign("city_id")->on("cities")->references("id")
                ->onDelete("cascade")
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
        Schema::dropIfExists('customer_addresses');
    }
}
