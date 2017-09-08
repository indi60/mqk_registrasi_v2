<?php

use Illuminate\Database\Seeder;

class RuteTransportasiTableSeeder extends Seeder
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
          ['id_rute_transportasi'=>1,'nama_rute_transportasi'=>'Bandara Ahmad Yani'],
          ['id_rute_transportasi'=>2,'nama_rute_transportasi'=>'Stasiun Tawang'],
          ['id_rute_transportasi'=>3,'nama_rute_transportasi'=>'Terminal Bus Terboyo'],
          ['id_rute_transportasi'=>4,'nama_rute_transportasi'=>'Terminal Bus Jepara'],
          ['id_rute_transportasi'=>5,'nama_rute_transportasi'=>'Pelabuhan Tanjung Emas'],
          ['id_rute_transportasi'=>6,'nama_rute_transportasi'=>'Lainnya'],

      ];
      DB::table('rute_transportasi')->insert($data);
    }
}
