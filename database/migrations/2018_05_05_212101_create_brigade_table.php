<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrigadeTable extends Migration
{

    public function up()
    {
        Schema::create('brigades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('numer_brygady');
            $table->string('rodzaj_dnia');
            $table->string('godziny');
            $table->string('miejsce_zmiany');
            $table->string('spolka');
            $table->string('przydzial');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brigade');
    }
}
