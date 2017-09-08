<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupaetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
          $table->engine='InnoDB';
          $table->increments('id_kabupaten');
          $table->string('nama_kabupaten',45);
          $table->integer('provinsi_id')->unsigned();
          $table->timestamps();



            $table->index('provinsi_id','fk_kabupaten_provinsi1_idx');
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
        Schema::drop('kabupaten');
    }
}
