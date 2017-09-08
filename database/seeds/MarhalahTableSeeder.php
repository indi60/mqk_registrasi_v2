<?php

use Illuminate\Database\Seeder;

class MarhalahTableSeeder extends Seeder
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
          ['id_marhalah'=>1,'marhalah'=>'Ula'],
          ['id_marhalah'=>2,'marhalah'=>'Wustho'],
          ['id_marhalah'=>3,'marhalah'=>'Ulya'],
          

      ];
      DB::table('marhalah')->insert($data);
    }
}
