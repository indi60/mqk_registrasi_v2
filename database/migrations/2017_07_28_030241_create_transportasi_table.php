<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportasi', function (Blueprint $table) {
          $table->engine='InnoDB';
          $table->increments('id_transportasi');
          $table->string('hari');
          $table->date('tanggal');
          $table->string('waktu');
          $table->string('dengan');
          $table->string('melalui');
          $table->string('keterangan');
          $table->enum('jenis', ['kedatangan', 'kepulangan']);
          $table->string('dokumen_url');

          $table->integer('kafilah_id')->unsigned();
          $table->timestamps();



            //$table->index('kafilah_id','fk_transportasi_kafilah1_idx');
            //$table->foreign('kafilah_id')->references('id_kafilah')->on('kafilah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transportasi');
    }
}
