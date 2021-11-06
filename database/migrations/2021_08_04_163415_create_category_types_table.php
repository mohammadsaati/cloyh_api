<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("vendor_type_id");
            $table->integer("status")->comment("1 active | 0 deActive ")->default(1);
            $table->timestamps();

            $table->foreign("category_id")->on("categories")->references("id")
                    ->onUpdate("cascade")
                    ->onDelete("restrict");

            $table->foreign("vendor_type_id")->on("vendor_types")->references("id")
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
        Schema::dropIfExists('category_types');
    }
}
