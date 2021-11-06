<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id");
            $table->unsignedBigInteger("section_id");
            $table->timestamps();

            $table->foreign("item_id")->on("items")->references("id")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->foreign("section_id")->on("sections")->references("id")
                ->onUpdate("cascade")
                ->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_sections');
    }
}
