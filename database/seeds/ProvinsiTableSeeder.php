<?php

use Illuminate\Database\Seeder;
use App\Provinsi;

class ProvinsiTableSeeder extends Seeder
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
          ['id_provinsi'=>11,'nama_provinsi'=>'Aceh'],
          ['id_provinsi'=>12,'nama_provinsi'=>'Sumatera Utara'],
          ['id_provinsi'=>13,'nama_provinsi'=>'Sumatera Barat'],
          ['id_provinsi'=>14,'nama_provinsi'=>'Riau'],
          ['id_provinsi'=>15,'nama_provinsi'=>'Jambi'],
          ['id_provinsi'=>16,'nama_provinsi'=>'Sumatera Selatan'],
          ['id_provinsi'=>17,'nama_provinsi'=>'Bengkulu'],
          ['id_provinsi'=>18,'nama_provinsi'=>'Lampung'],
          ['id_provinsi'=>19,'nama_provinsi'=>'Bangka Belitung'],
          ['id_provinsi'=>21,'nama_provinsi'=>'Kepulauan Riau'],
          ['id_provinsi'=>31,'nama_provinsi'=>'DKI Jakarta'],
          ['id_provinsi'=>32,'nama_provinsi'=>'Jawa Barat'],
          ['id_provinsi'=>33,'nama_provinsi'=>'Jawa Tengah'],
          ['id_provinsi'=>34,'nama_provinsi'=>'DI Yogyakarta'],
          ['id_provinsi'=>35,'nama_provinsi'=>'Jawa Timur'],
          ['id_provinsi'=>36,'nama_provinsi'=>'Banten'],
          ['id_provinsi'=>51,'nama_provinsi'=>'Bali'],
          ['id_provinsi'=>52,'nama_provinsi'=>'Nusa Tenggara Barat'],
          ['id_provinsi'=>53,'nama_provinsi'=>'Nusa Tenggara Timur'],
          ['id_provinsi'=>61,'nama_provinsi'=>'Kalimantan Barat'],
          ['id_provinsi'=>62,'nama_provinsi'=>'Kalimantan Tengah'],
          ['id_provinsi'=>63,'nama_provinsi'=>'Kalimantan Selatan'],
          ['id_provinsi'=>64,'nama_provinsi'=>'Kalimantan Timur'],
          ['id_provinsi'=>65,'nama_provinsi'=>'Kalimantan Utara'],
          ['id_provinsi'=>71,'nama_provinsi'=>'Sulawesi Utara'],
          ['id_provinsi'=>72,'nama_provinsi'=>'Sulawesi Tengah'],
          ['id_provinsi'=>73,'nama_provinsi'=>'Sulawesi Selatan'],
          ['id_provinsi'=>74,'nama_provinsi'=>'Sulawesi Tenggara'],
          ['id_provinsi'=>75,'nama_provinsi'=>'Gorontalo'],
          ['id_provinsi'=>76,'nama_provinsi'=>'Sulawesi Barat'],
          ['id_provinsi'=>81,'nama_provinsi'=>'Maluku'],
          ['id_provinsi'=>82,'nama_provinsi'=>'Maluku Utara'],
          ['id_provinsi'=>91,'nama_provinsi'=>'Papua'],
          ['id_provinsi'=>92,'nama_provinsi'=>'Papua Barat'],
      ];
      DB::table('provinsi')->insert($data);
    }
}
