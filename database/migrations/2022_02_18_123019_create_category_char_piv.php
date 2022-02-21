<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryCharPiv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('category_chars', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('category_id');
          $table->unsignedBigInteger('characteristic_id');


          $table->foreign('characteristic_id')
          ->references('id')
          ->on('characteristics')
          ->onDelete('cascade');

          $table->foreign('category_id')
          ->references('id')
          ->on('categories')
          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_chars');
    }
}
