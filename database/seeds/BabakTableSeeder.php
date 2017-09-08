<?php

use Illuminate\Database\Seeder;

class BabakTableSeeder extends Seeder
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
          ['id_babak'=>1,'nama_babak'=>'Penyisihan'],
          ['id_babak'=>2,'nama_babak'=>'Final'],
          
          

      ];
      DB::table('babak')->insert($data);
    }
}
