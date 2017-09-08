<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKafilahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafilah', function (Blueprint $table) {
          $table->engine='InnoDB';
          $table->increments('id_kafilah');
          $table->string('nama_kafilah',45);
          $table->integer('status');
          $table->text('alasan');
          $table->integer('provinsi_id')->unsigned();
          $table->timestamps();



            $table->index('provinsi_id','fk_kafilah_provinsi1_idx');
            $table->foreign('provinsi_id')->references('id_provinsi')->on('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kafilah');
    }
}
