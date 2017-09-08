<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kafilah extends Model
{
  protected $connection = 'mysql2';
  
  protected $table = 'kafilah';
  protected $primaryKey = 'id_kafilah';
  protected $fillable=
  [
    'id_kafilah',
    'nama_kafilah',
    'status',
    'alasan',
    'provinsi_id',

  ];
  protected $guarded = [
      'id_kafilah'
  ];

  public function transportasi(){
      return $this->hasMany('App\Transportasi','kafilah_id','id_kafilah');
  }

  public function provinsi(){
      return $this->belongsTo('App\Provinsi','provinsi_id');
  }

  public function peserta(){
      return $this->hasMany('App\Peserta','kafilah_id','id_kafilah');
  }
}
