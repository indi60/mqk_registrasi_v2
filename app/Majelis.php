<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Majelis extends Model
{

      protected $table = 'majelis';
	  protected $primaryKey = 'id_majelis';
	  protected $fillable=
	  [
	    'id_majelis',
      'tanggal',
      'hari',
	    'bidang_lomba_id',
	    'babak_id',
	    'marhalah_id',
      'pria_wanita',
	    'dewan_hakim_3',
	    'dewan_hakim_2',
	    'dewan_hakim_1',
	    'panitera_2',
	    'panitera_1',
      'token',


	  ];
	  

	  public function babak(){
      	return $this->belongsTo('App\Babak','babak_id');
  	  }

  	  public function bidang_lomba_majelis(){
      	return $this->belongsTo('App\BidangLomba','bidang_lomba_id');
  	  }

  	  public function marhalah_majelis(){
      	return $this->belongsTo('App\Marhalah','marhalah_id');
  	  }

  	  public function dewan_hakim_1_majelis(){
      	return $this->belongsTo('App\Peserta','dewan_hakim_1');
  	  }

  	  public function dewan_hakim_2_majelis(){
      	return $this->belongsTo('App\Peserta','dewan_hakim_2');
  	  }

  	  public function dewan_hakim_3_majelis(){
      	return $this->belongsTo('App\Peserta','dewan_hakim_3');
  	  }

  	  public function panitera_1_majelis(){
      	return $this->belongsTo('App\Peserta','panitera_1');
  	  }

  	  public function panitera_2_majelis(){
      	return $this->belongsTo('App\Peserta','panitera_2');
  	  }

      public function majelis_peserta(){
        return $this->hasMany('App\MajelisPeserta','majelis_id','id_majelis');
  }
}
