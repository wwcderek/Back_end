<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $genre = array("Action", "Horror", "Drama", "Fiction", "War", "Thriller", "Animation", "History", "Romance");

        Schema::create('genres', function (Blueprint $table) {
            $table->increments('genre_id');
            $table->string('name');
        });

        foreach ($genre as $gen) {
            DB::table('genres')->insert(
                array(
                    'name' => $gen
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
