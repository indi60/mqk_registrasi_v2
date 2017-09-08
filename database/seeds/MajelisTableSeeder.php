<?php

use Illuminate\Database\Seeder;

class MajelisTableSeeder extends Seeder
{
	//generate token
    public function getToken($length){
         $token = "";
         $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
         $codeAlphabet.= "0123456789";
         $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	

        $data =
      [
      	  //1->Fiqh 	
          ['bidang_lomba_id'=>1,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>1,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //2->Nahw
          ['bidang_lomba_id'=>2,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>2,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //3->Akhlaq
          ['bidang_lomba_id'=>3,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>3,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //4->Tarikh
          ['bidang_lomba_id'=>4,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>4,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //5->Tauhid
          ['bidang_lomba_id'=>5,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>1, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>2, 'marhalah_id' => 1, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>5,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //6->Tafsir
          ['bidang_lomba_id'=>6,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>6,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //7->Hadits
          ['bidang_lomba_id'=>7,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>7,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          
          //8->ushul Fiqh
          ['bidang_lomba_id'=>8,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>8,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //9->Balaghah
          ['bidang_lomba_id'=>9,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>1, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>2, 'marhalah_id' => 2, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>9,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //10->Ilmu Hadits
          ['bidang_lomba_id'=>10,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>10,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>10,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>10,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //11->Ilmu Tafsir
          ['bidang_lomba_id'=>11,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>11,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>11,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>11,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //12->Debat B. Arab
          ['bidang_lomba_id'=>12,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>12,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>12,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>12,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //13->Debat B. Inggris
          ['bidang_lomba_id'=>13,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>13,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>13,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>13,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],

          //14->Eksebisi
          ['bidang_lomba_id'=>14,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>14,'babak_id'=>1, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>14,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'pria', 'token' => $this->getToken(4)],
          ['bidang_lomba_id'=>14,'babak_id'=>2, 'marhalah_id' => 3, 'pria_wanita' => 'wanita', 'token' => $this->getToken(4)],



      ];
      DB::table('majelis')->insert($data);
    }
}
