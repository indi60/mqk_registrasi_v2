<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
  protected $table = 'kabupaten';
  protected $primaryKey = 'id_kabupaten';
  protected $fillable=
  [
    'id_kabupaten',
    'nama_kabupaten',
    'provinsi_id',

  ];
  protected $guarded = [
      'id_kabupaten'
  ];

    public function provinsi(){
        return $this->belongsTo('App\Provinsi','provinsi_id');
      }

    public function pesantren(){
        return $this->hasMany('App\Pesantren','kabupaten_id','id_kabupaten');
      }
}
