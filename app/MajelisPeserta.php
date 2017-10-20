<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajelisPeserta extends Model
{
      protected $table = 'majelis_peserta';
  	  protected $primaryKey = 'id_majelis_peserta';
	  protected $fillable=
	  [
	    	'id_majelis_peserta',
	    
            
            'no_peserta',
            'no_peserta_lawan',
            'majelis_id',

            'no_urut',
            'jumlah_menang',
            'pro_kontra',
            'nilai_1_hakim_1',
            'nilai_2_hakim_1',
            'nilai_3_hakim_1',
            'nilai_4_hakim_1',
            'nilai_5_hakim_1',
            'nilai_6_hakim_1',

            'nilai_1_hakim_2',
            'nilai_2_hakim_2',
            'nilai_3_hakim_2',
            'nilai_4_hakim_2',
            'nilai_5_hakim_2',
            'nilai_6_hakim_2',

            'nilai_1_hakim_3',
            'nilai_2_hakim_3',
            'nilai_3_hakim_3',
            'nilai_4_hakim_3',
            'nilai_5_hakim_3',
            'nilai_6_hakim_3',

            //debat 
            'nilai_pro_hakim_1',
            'nilai_pro_hakim_2',
            'nilai_pro_hakim_3',

            'nilai_kontra_hakim_1',
            'nilai_kontra_hakim_2',
            'nilai_kontra_hakim_3',

            'no_peserta_pemenang_hakim_1',
            'no_peserta_pemenang_hakim_2',
            'no_peserta_pemenang_hakim_3',


            'jumlah_tampil',

	  ];
	  
	  public function peserta(){
		    return $this->belongsTo('App\Peserta', 'no_peserta', 'no_peserta');
		}
	  public function majelis(){
		    return $this->belongsTo('App\Majelis', 'majelis_id', 'id_majelis');
		}	
	 
}
