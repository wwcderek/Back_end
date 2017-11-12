<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->string('title');
            $table->string('description');
            $table->integer('rating');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('film_id')->on('films');
            $table->timestamps();
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

        Schema::dropIfExists('reviews');

        Schema::enableForeignKeyConstraints();

    }
}
