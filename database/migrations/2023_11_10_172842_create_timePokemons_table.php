<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timePokemons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pokemon1');
            $table->foreign('pokemon1')->references('id')->on('pokemons');
            $table->unsignedBigInteger('pokemon2')->nullable();
            $table->foreign('pokemon2')->references('id')->on('pokemons');
            $table->unsignedBigInteger('pokemon3')->nullable();
            $table->foreign('pokemon3')->references('id')->on('pokemons');
            $table->unsignedBigInteger('pokemon4')->nullable();
            $table->foreign('pokemon4')->references('id')->on('pokemons');
            $table->unsignedBigInteger('pokemon5')->nullable();
            $table->foreign('pokemon5')->references('id')->on('pokemons');
            $table->unsignedBigInteger('pokemon6')->nullable();
            $table->foreign('pokemon6')->references('id')->on('pokemons');
            $table->softDeletes();
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
        Schema::dropIfExists('timePokemons');
    }
}
