<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('barcodes', function (Blueprint $table) {
            $table->increments('barcode_id');
            $table->string('value');
            $table->dateTime('expired_time');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');

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

        Schema::dropIfExists('barcodes');

        Schema::enableForeignKeyConstraints();

    }
}
