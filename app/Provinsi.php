<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
  protected $table = 'provinsi';
  protected $primaryKey = 'id_provinsi';
  protected $fillable=
  [
    'id_provinsi',
    'nama_provinsi',

  ];
  
  public function kabupaten(){
      return $this->hasMany('App\Kabupaten','provinsi_id','id_provinsi');
    }
  public function kafilah(){
      return $this->hasOne('App\Kafilah','provinsi_id','id_provinsi');
    }
}
