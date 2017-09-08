<?php

use Illuminate\Database\Seeder;

class BidangLombaTableSeeder extends Seeder
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
          ['id_bidang_lomba'=>1,'bidang_lomba'=>'Fiqh', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>2,'bidang_lomba'=>'Nahw', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>3,'bidang_lomba'=>'Akhlaq', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>4,'bidang_lomba'=>'Tarikh', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>5,'bidang_lomba'=>'Tauhid', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>6,'bidang_lomba'=>'Tafsir', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>7,'bidang_lomba'=>'Hadits', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>8,'bidang_lomba'=>'Ushul Fiqh', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>9,'bidang_lomba'=>'Balaghah', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>10,'bidang_lomba'=>'Ilmu Hadits', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>11,'bidang_lomba'=>'Ilmu Tafsir', 'jenis_lomba' => 'individu'],
          ['id_bidang_lomba'=>12,'bidang_lomba'=>'Debat B. Arab', 'jenis_lomba' => 'kelompok'],
          ['id_bidang_lomba'=>13,'bidang_lomba'=>'Debat B. Inggris', 'jenis_lomba' => 'kelompok'],
          ['id_bidang_lomba'=>14,'bidang_lomba'=>'Eksebisi', 'jenis_lomba' => 'kelompok'],
          
          

      ];
      DB::table('bidang_lomba')->insert($data);
    }
}
