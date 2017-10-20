<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = 'transportasi';
    protected $primaryKey = 'id_transportasi';
    protected $fillable=
    [
      'hari',
      'tanggal',
      'waktu',
      'dengan',
      'melalui',
      'keterangan',
      'jenis',
      'dokumen_url',
      'kafilah_id',


    ];
   

    public function kafilah(){
        return $this->belongsTo('App\Kafilah','kafilah_id');
    }
    public function kepulangan(){
        return $this->hasMany('App\Peserta','kepulangan_id','id_transportasi');
    }
    public function kedatangan(){
        return $this->hasMany('App\Peserta','kedatangan_id','id_transportasi');
    }

    public function moda_transportasi(){
        return $this->belongsTo('App\ModaTransportasi','dengan');
      }
    public function rute_transportasi(){
        return $this->belongsTo('App\RuteTransportasi','melalui');
      }
}
