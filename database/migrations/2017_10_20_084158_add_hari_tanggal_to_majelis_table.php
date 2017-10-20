<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHariTanggalToMajelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majelis', function (Blueprint $table) {
            $table->string('hari')->nullable()->after('id_majelis');
            $table->date('tanggal')->nullable()->after('id_majelis');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('majelis', function (Blueprint $table) {
            $table->dropColumn('hari');
            $table->dropColumn('tanggal');
            
        });
    }
}
