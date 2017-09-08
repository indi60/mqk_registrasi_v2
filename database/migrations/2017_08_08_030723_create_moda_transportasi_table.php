<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModaTransportasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moda_transportasi', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id_moda_transportasi');
            $table->string('nama_moda_transportasi',45);
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
        Schema::drop('moda_transportasi');
    }
}
