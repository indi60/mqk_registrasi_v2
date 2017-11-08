<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiTotalJuaraToMajelisPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majelis_peserta', function (Blueprint $table) {
            $table->decimal('nilai_total')->nullable()->after('no_peserta_pemenang_hakim_3');
            $table->integer('juara')->nullable()->after('no_peserta_pemenang_hakim_3');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('majelis_peserta', function (Blueprint $table) {
            $table->dropColumn('nilai_total');
            $table->dropColumn('juara');
        });
    }
}
