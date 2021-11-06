<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("city_id");
            $table->unsignedBigInteger("vendor_type")->comment("related to vendor type table");
            $table->string("company_name");
            $table->timestamps();

            $table->foreign("user_id")->on("users")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->foreign("vendor_type")->on("vendor_types")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->foreign("city_id")->on("cities")->references("id")
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
        Schema::dropIfExists('vendors');
    }
}
