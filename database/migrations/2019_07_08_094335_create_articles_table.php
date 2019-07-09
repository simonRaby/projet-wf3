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
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            $table->unsignedBigInteger('partners_id');
            $table->foreign('partners_id')->references('id')->on('partners');
            $table->unsignedBigInteger('genders_id');
            $table->foreign('genders_id')->references('id')->on('genders');
            $table->unsignedBigInteger('collects_id');
            $table->foreign('collects_id')->references('id')->on('collects');
            $table->string('name');
            $table->string('img')->nullable();
            $table->boolean('is_collect')->default(false);
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
