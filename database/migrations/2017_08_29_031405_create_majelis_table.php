<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majelis', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id_majelis');
            $table->integer('bidang_lomba_id');
            $table->integer('babak_id');
            $table->integer('marhalah_id');
            $table->enum('pria_wanita', ['pria', 'wanita']);
            $table->integer('dewan_hakim_1');
            $table->integer('dewan_hakim_2');
            $table->integer('dewan_hakim_3');
            $table->integer('panitera_1');
            $table->integer('panitera_2');
            $table->string('token')->unique();
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
        Schema::drop('majelis');
    }
}
