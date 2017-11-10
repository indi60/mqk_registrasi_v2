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
          ['nama_pengguna'=>'Operator Registrasi 1','email'=>'operator1@gmail.com','password'=>bcrypt('000000'), 'role'=>'operator_registrasi','spesifik_akses'=>0],
          ['nama_pengguna'=>'Operator Registrasi 2','email'=>'operator2@gmail.com','password'=>bcrypt('000000'), 'role'=>'operator_registrasi','spesifik_akses'=>0],
          ['nama_pengguna'=>'Operator Registrasi 3','email'=>'operator3@gmail.com','password'=>bcrypt('000000'), 'role'=>'operator_registrasi','spesifik_akses'=>0],
          ['nama_pengguna'=>'Operator Registrasi 4','email'=>'operator4@gmail.com','password'=>bcrypt('000000'), 'role'=>'operator_registrasi','spesifik_akses'=>0],
          ['nama_pengguna'=>'Operator Registrasi 5','email'=>'operator5@gmail.com','password'=>bcrypt('000000'), 'role'=>'operator_registrasi','spesifik_akses'=>0],
    	];
      	DB::table('pengguna')->insert($data);
    }
}
