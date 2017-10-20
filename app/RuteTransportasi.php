<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuteTransportasi extends Model
{
  protected $table = 'rute_transportasi';
  protected $primaryKey = 'id_rute_transportasi';
  protected $fillable=
  [
    'id_rute_transportasi',
    'nama_rute_transportasi',


  ];
  


    public function transportasi(){
        return $this->hasMany('App\Transportasi','melalui','id_rute_transportasi');
      }
}
