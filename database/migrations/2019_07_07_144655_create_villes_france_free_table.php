<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillesFranceFreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes_france_free', function (Blueprint $table) {
            $table->bigIncrements('ville_id');
            $table->string('ville_departement');
            $table->string('ville_slug');
            $table->string('ville_nom');
            $table->string('ville_nom_simple');
            $table->string('ville_nom_reel');
            $table->string('ville_nom_soundex');
            $table->string('ville_nom_metaphone');
            $table->string('ville_code_postal');
            $table->string('ville_commune');
            $table->string('ville_code_commune')->unique();
            $table->integer('ville_arrondissement');
            $table->string('ville_canton');
            $table->integer('ville_amdi');
            $table->integer('ville_population_2010');
            $table->integer('ville_population_1999');
            $table->integer('ville_population_2012');
            $table->integer('ville_densite_2010');
            $table->float('ville_surface');
            $table->float('ville_longitude_deg');
            $table->float('ville_latitude_deg');
            $table->string('ville_longitude_grd');
            $table->string('ville_latitude_grd');
            $table->string('ville_longitude_dms');
            $table->string('ville_latitude_dms');
            $table->integer('ville_zmin');
            $table->integer('ville_zmax');
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
        Schema::dropIfExists('ville_france');
    }
}
