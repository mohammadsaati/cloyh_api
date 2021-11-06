<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->integer("priority");
            $table->string("image");
            $table->unsignedBigInteger("product_id")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("section_id")->nullable();
            $table->string("link")->nullable();
            $table->integer("type")->comment("1 product | 2 category | 3 link | 4 section");
            $table->integer("status")->comment("1 for web | 2 for apps");
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
        Schema::dropIfExists('sliders');
    }
}
