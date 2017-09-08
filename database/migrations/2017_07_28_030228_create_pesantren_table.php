<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesantrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesantren', function (Blueprint $table) {
          $table->engine='InnoDB';
          $table->increments('id_pesantren');
          $table->string('nspp');
          $table->string('nama_pesantren');
          $table->string('alamat');
          $table->string('tlp');
          $table->string('pengasuh');

          $table->integer('kabupaten_id')->unsigned();
          $table->timestamps();



            $table->index('kabupaten_id','fk_pesantren_kabupaten1_idx');
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pesantren');
    }
}
