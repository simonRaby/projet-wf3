<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qrcodes_id')->nullable();
            $table->foreign('qrcodes_id')->references('id')->on('qrcodes');
            $table->string('link');
            $table->string('code');
            $table->string('img_code');
            $table->integer('status');
            $table->dateTime('delete_at')->nullable();
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
        Schema::dropIfExists('qrcodes');
    }
}
