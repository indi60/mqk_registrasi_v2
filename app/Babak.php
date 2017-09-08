<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Babak extends Model
{
      protected $table = 'babak';
	  protected $primaryKey = 'id_babak';
	  protected $fillable=
	  [
	    'id_babak',
	    'nama_babak',


	  ];
	  protected $guarded = [
	      'id_babak'
	  ];

	  public function majelis(){
	      return $this->hasMany('App\Majelis','babak_id','id_babak');
	  }
}
