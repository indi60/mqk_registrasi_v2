<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id_pengguna');
            $table->string('nama_pengguna', 255);
            $table->string('email', 255)->unique();
            $table->string('tlp');
            $table->string('nik', 255);
            $table->string('password', 255);
            $table->string('token', 255);
            $table->string('remember_token', 255);
            $table->enum('role', ['kafilah','admin_pusat','operator_registrasi','panitera']);
            $table->integer('spesifik_akses');
            $table->integer('kafilah_id');
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
        Schema::drop('pengguna');
    }
}
