<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangLomba extends Model
{
      protected $table = 'bidang_lomba';
	  protected $primaryKey = 'id_bidang_lomba';
	  protected $fillable=
	  [
	    'id_bidang_lomba',
	    'bidang_lomba',
	    'jenis_lomba,'


	  ];
	  protected $guarded = [
	      'id_bidang_lomba'
	  ];

	  public function peserta(){
	      return $this->hasMany('App\Peserta','bidang_lomba_id','id_bidang_lomba');
	  }

	  public function majelis(){
	      return $this->hasMany('App\Majelis','bidang_lomba_id','id_bidang_lomba');
	  }
}
