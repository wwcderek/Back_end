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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->string('title');
            $table->string('description');
            $table->integer('rating');
            $table->integer('user_id');
            $table->integer('film_id');
            $table->timestamps();
        });

//        Schema::table('reviews', function($table) {
//            $table->foreign('user_id')->references('user_id')->on('users');
//            $table->foreign('film_id')->references('film_id')->on('films');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
