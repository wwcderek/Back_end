<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleHasFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_film', function (Blueprint $table) {
            $table->increments('role_has_film_id');
            $table->integer('film_id')->unsigned();
            $table->foreign('film_id')->references('film_id')->on('films');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_film');
    }
}
