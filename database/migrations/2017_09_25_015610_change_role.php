<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE pengguna CHANGE COLUMN role role ENUM('kafilah', 'admin_pusat', 'operator_registrasi','panitera','panitera_debat','panitera_eksebisi','panitera_kitab')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
