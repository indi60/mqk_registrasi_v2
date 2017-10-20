<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debat', function (Blueprint $table) {
            $table->increments('id_debat');
            $table->integer('bidang_lomba_id');
            $table->integer('majelis_id');

            $table->string('no_peserta_tim_1');
            $table->string('no_peserta_tim_2');

            $table->decimal('nilai_pro_hakim_1', 5, 2);
            $table->decimal('nilai_pro_hakim_2', 5, 2);
            $table->decimal('nilai_pro_hakim_3', 5, 2);

            $table->decimal('nilai_kontra_hakim_1', 5, 2);
            $table->decimal('nilai_kontra_hakim_2', 5, 2);
            $table->decimal('nilai_kontra_hakim_3', 5, 2);

            $table->string('no_peserta_pemenang_hakim_1');
            $table->string('no_peserta_pemenang_hakim_2');
            $table->string('no_peserta_pemenang_hakim_3');
            

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
        Schema::drop('debat');
    }
}
