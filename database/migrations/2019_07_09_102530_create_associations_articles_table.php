<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('articles_id');
            $table->foreign('articles_id')->references('id')->on('articles');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            $table->unsignedBigInteger('colors_id');
            $table->foreign('colors_id')->references('id')->on('colors');
            $table->bigInteger('quantity');
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
        Schema::dropIfExists('associations_articles');
    }
}
