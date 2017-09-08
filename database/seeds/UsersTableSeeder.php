<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	$data =
      	[
          ['nama_pengguna'=>'Operator Registrasi','email'=>'operator@gmail.com','password'=>bcrypt('000000'), 'role'=>'operator_registrasi','spesifik_akses'=>0],
    	];
      	DB::table('pengguna')->insert($data);
    }
}
