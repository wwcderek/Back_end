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
        Schema::disableForeignKeyConstraints();

        Schema::create('role_has_film', function (Blueprint $table) {
            $table->increments('role_has_film_id');
            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('film_id')->on('films');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
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

        Schema::dropIfExists('role_has_film');

        Schema::enableForeignKeyConstraints();

    }
}
