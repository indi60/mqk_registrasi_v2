<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToMajelisPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majelis_peserta', function (Blueprint $table) {
            $table->string('pro_kontra')->nullable()->after('no_urut');
            $table->integer('jumlah_menang')->nullable()->after('no_urut');
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
            $table->dropColumn('pro_kontra');
            $table->dropColumn('jumlah_menang');
        });
    }
}
