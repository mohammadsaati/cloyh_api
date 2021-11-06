<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->integer("type")->comment("1 product | 2 category | 3 link");
            $table->unsignedBigInteger("product_id")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->string("link")->nullable();
            $table->integer("status")->comment("0 deActive | 1 active | 2 just_in_cat_pages");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
