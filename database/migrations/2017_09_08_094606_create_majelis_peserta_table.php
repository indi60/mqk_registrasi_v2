<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajelisPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majelis_peserta', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id_majelis_peserta');
            $table->string('no_peserta',255);
            $table->integer('majelis_id');
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
        Schema::drop('majelis_peserta');
    }
}
