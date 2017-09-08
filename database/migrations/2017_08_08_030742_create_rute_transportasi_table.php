<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuteTransportasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rute_transportasi', function (Blueprint $table) {
          $table->engine='InnoDB';
          $table->increments('id_rute_transportasi');
          $table->string('nama_rute_transportasi',45);
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
        Schema::drop('rute_transportasi');
    }
}
