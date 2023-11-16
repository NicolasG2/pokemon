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
            $table->unsignedBigInteger('id_pokemon');
            $table->foreign('id_pokemon')->references('id')->on('pokemons');
            $table->unsignedBigInteger('id_time');
            $table->foreign('id_time')->references('id')->on('times');
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
