<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marhalah extends Model
{
      protected $table = 'marhalah';
	  protected $primaryKey = 'id_marhalah';
	  protected $fillable=
	  [
	    'id_marhalah',
	    'marhalah',


	  ];
	  protected $guarded = [
	      'id_marhalah'
	  ];

	  public function peserta(){
	      return $this->hasMany('App\Peserta','marhalah_id','id_marhalah');
	  }

	  public function majelis(){
	      return $this->hasMany('App\Majelis','marhalah_id','id_marhalah');
	  }

}
