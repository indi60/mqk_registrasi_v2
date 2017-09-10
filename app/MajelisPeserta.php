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
	    'majelis_id',

	  ];
	  protected $guarded = [
	      'id_majelis_peserta'
	  ];
	  public function peserta(){
		    return $this->belongsTo('App\Peserta', 'no_peserta', 'no_peserta');
		}
	  public function majelis(){
		    return $this->belongsTo('App\Majelis', 'majelis_id', 'id_majelis');
		}	
	 
}
