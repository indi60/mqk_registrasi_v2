<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
          $table->engine='InnoDB';
          $table->increments('id_peserta');
          $table->string('no_registrasi');
          $table->string('no_peserta');
          $table->integer('marhalah_id')->nullable();
          $table->string('marhalah');
          $table->integer('bidang_lomba_id')->nullable();
          $table->string('bidang');
          $table->string('nama_lengkap');
          $table->enum('jenis_kelamin', ['pria', 'wanita']);
          $table->string('nik');
          $table->string('tempat_lahir');
          $table->date('tanggal_lahir');
          $table->string('tlp');
          $table->string('email');
          //pesantren
          $table->string('nspp');
          $table->string('nama_pesantren');
          $table->text('alamat_pesantren');
          $table->string('tlp_pesantren');
          $table->string('pengasuh');
          //pesantren
          $table->integer('pesantren_id')->unsigned();
          $table->integer('kedatangan_id')->unsigned();
          $table->integer('kepulangan_id')->unsigned();
          $table->integer('kafilah_id')->unsigned();
          $table->string('dokumen_url');
          $table->string('posisi');
          $table->string('penugasan');
          $table->string('instansi');
          $table->string('nama_instansi');
          $table->text('alamat_instansi');
          $table->string('jabatan');
          $table->enum('jenis_peserta', ['peserta', 'panitia', 'vip','pentas_seni','bazar','dewan_hakim','panitera','lainnya']);
          $table->string('klasifikasi_partisipan');
          $table->text('deskripsi');
          $table->integer('jumlah_kru');
          $table->integer('durasi_tampil');
          $table->integer('jumlah_stand');
          $table->string('penerangan');
          $table->string('daya_listrik');
          $table->string('pendidikan_terakhir');
          $table->text('alamat');
          $table->integer('status');
          $table->text('alasan');
          $table->text('foto');

          $table->timestamps();
          $table->integer('updated_by');
          $table->integer('majelis_id');

          $table->integer('cek_form_data_peserta');
          $table->integer('cek_izin_operasional_pesantren');
          $table->integer('cek_raport');
          $table->integer('cek_akte_kelahiran');
          $table->integer('cek_sk');


          


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peserta');
    }
}
