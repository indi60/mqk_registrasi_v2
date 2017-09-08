<?php

use Illuminate\Database\Seeder;

class ModaTransportasiTableSeeder extends Seeder
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
          ['id_moda_transportasi'=>1,'nama_moda_transportasi'=>'Pesawat Terbang'],
          ['id_moda_transportasi'=>2,'nama_moda_transportasi'=>'Bus / Minibus'],
          ['id_moda_transportasi'=>3,'nama_moda_transportasi'=>'Kereta API'],
          ['id_moda_transportasi'=>4,'nama_moda_transportasi'=>'Kapal Laut'],
          ['id_moda_transportasi'=>5,'nama_moda_transportasi'=>'Kendaraan Pribadi'],
          ['id_moda_transportasi'=>6,'nama_moda_transportasi'=>'Lainnya'],

      ];
      DB::table('moda_transportasi')->insert($data);
    }
}
