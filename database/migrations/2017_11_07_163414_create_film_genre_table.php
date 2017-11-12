<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('film_genre', function (Blueprint $table) {
            $table->increments('film__genre_id');
            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('film_id')->on('films');
            $table->unsignedInteger('genre_id');
            $table->foreign('genre_id')->references('genre_id')->on('genres');
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('film_genre');

        Schema::enableForeignKeyConstraints();

    }
}
