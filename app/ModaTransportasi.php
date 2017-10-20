<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModaTransportasi extends Model
{
  protected $table = 'moda_transportasi';
  protected $primaryKey = 'id_moda_transportasi';
  protected $fillable=
  [
    'id_moda_transportasi',
    'nama_moda_transportasi',


  ];
 

  public function transportasi(){
      return $this->hasMany('App\Transportasi','dengan','id_moda_transportasi');
    }

}
