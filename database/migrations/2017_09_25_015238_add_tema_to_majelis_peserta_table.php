<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTemaToMajelisPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majelis_peserta', function (Blueprint $table) {
            $table->string('tema')->nullable()->after('pro_kontra');
            
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
            $table->dropColumn('tema');
        });
    }
}
