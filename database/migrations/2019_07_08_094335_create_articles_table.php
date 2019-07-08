<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ranks_id');
            $table->foreign('ranks_id')->references('id')->on('ranks');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            $table->unsignedBigInteger('partners_id');
            $table->foreign('partners_id')->references('id')->on('partners');
            $table->unsignedBigInteger('genders_id');
            $table->foreign('genders_id')->references('id')->on('genders');
            $table->string('name');
            $table->string('color');
            $table->integer('quantity');

            $table->string('img')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
