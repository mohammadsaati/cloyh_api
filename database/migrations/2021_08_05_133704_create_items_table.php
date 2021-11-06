<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique()->index();
            $table->integer("code")->unique()->index();
            $table->string("image");
            $table->longText("description")->nullable();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->integer("status")->comment("1 active | 0 deActive | 2 just for admin")->default(1);
            $table->timestamps();


            $table->foreign("category_id")->on("categories")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
