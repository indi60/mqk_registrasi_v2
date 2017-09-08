<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_lomba', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id_bidang_lomba');
            $table->string('bidang_lomba',255);
            $table->enum('jenis_lomba',['individu','kelompok']);
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
        Schema::drop('bidang_lomba');
    }
}
