<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('brigade_id')->unsigned();
            $table->integer('id_dnia')->unsigned();
            $table->integer('numer_kierowcy')->unique();
            $table->integer('nr_pojazdu');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('brigade_id')->references('id')->on('brigades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Track');
    }
}
