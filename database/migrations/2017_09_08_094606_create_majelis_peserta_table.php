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
            $table->string('no_peserta_lawan',255);
            $table->integer('majelis_id');

            $table->integer('no_urut');
            $table->decimal('nilai_1_hakim_1', 5, 2);
            $table->decimal('nilai_2_hakim_1', 5, 2);
            $table->decimal('nilai_3_hakim_1', 5, 2);
            $table->decimal('nilai_4_hakim_1', 5, 2);
            $table->decimal('nilai_5_hakim_1', 5, 2);
            $table->decimal('nilai_6_hakim_1', 5, 2);

            $table->decimal('nilai_1_hakim_2', 5, 2);
            $table->decimal('nilai_2_hakim_2', 5, 2);
            $table->decimal('nilai_3_hakim_2', 5, 2);
            $table->decimal('nilai_4_hakim_2', 5, 2);
            $table->decimal('nilai_5_hakim_2', 5, 2);
            $table->decimal('nilai_6_hakim_2', 5, 2);

            $table->decimal('nilai_1_hakim_3', 5, 2);
            $table->decimal('nilai_2_hakim_3', 5, 2);
            $table->decimal('nilai_3_hakim_3', 5, 2);
            $table->decimal('nilai_4_hakim_3', 5, 2);
            $table->decimal('nilai_5_hakim_3', 5, 2);
            $table->decimal('nilai_6_hakim_3', 5, 2);

            //debat 
            $table->decimal('nilai_pro_hakim_1', 5, 2);
            $table->decimal('nilai_pro_hakim_2', 5, 2);
            $table->decimal('nilai_pro_hakim_3', 5, 2);

            $table->decimal('nilai_kontra_hakim_1', 5, 2);
            $table->decimal('nilai_kontra_hakim_2', 5, 2);
            $table->decimal('nilai_kontra_hakim_3', 5, 2);

            $table->string('no_peserta_pemenang_hakim_1');
            $table->string('no_peserta_pemenang_hakim_2');
            $table->string('no_peserta_pemenang_hakim_3');


            $table->integer('jumlah_tampil');

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
