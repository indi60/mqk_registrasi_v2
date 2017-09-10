<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
  protected $table = 'peserta';
  protected $primaryKey = 'id_peserta';
  protected $fillable=
  [
    'no_registrasi',
    'no_peserta',
    'marhalah_id',
    'marhalah',
    'bidang_lomba_id',
    'bidang',
    'nama_lengkap',
    'jenis_kelamin',
    'nik',
    'tempat_lahir',
    'tanggal_lahir',
    'tlp',
    'email',
    'nspp',
    'nama_pesantren',
    'alamat_pesantren',
    'tlp_pesantren',
    'pengasuh',
    'kedatangan_id',
    'kepulangan_id',
    'kafilah_id',
    'dokumen_url',
    'posisi',
    'penugasan',
    'instansi',
    'nama_instansi',
    'alamat_instansi',
    'jabatan',
    'jenis_peserta',
    'klasifikasi_partisipan',
    'deskripsi',
    'jumlah_kru',
    'durasi_tampil',
    'jumlah_stand',
    'penerangan',
    'daya_listrik',
    'pendidikan_terakhir',
    'alamat',
    'updated_by',
    'majelis_id',
    'status',
    'alasan',
    'foto',
    'cek_form_data_peserta',
          'cek_izin_operasional_pesantren',
          'cek_raport',
          'cek_akte_kelahiran',
          'cek_sk',

  ];
  protected $guarded = [
      'id_peserta'
  ];


  public function kafilah(){
      return $this->belongsTo('App\Kafilah','kafilah_id');
  }
  public function kedatangan(){
      return $this->belongsTo('App\Transportasi','kedatangan_id');
  }
  public function kepulangan(){
      return $this->belongsTo('App\Transportasi','kepulangan_id');
  }

  
  public function bidang_lomba_peserta(){
      return $this->belongsTo('App\BidangLomba','bidang_lomba_id');
  }

  public function marhalah_peserta(){
      return $this->belongsTo('App\Marhalah','marhalah_id');
  }

  public function dewan_hakim_1(){
        return $this->hasMany('App\Majelis','dewan_hakim_1','id_peserta');
  }

  public function dewan_hakim_2(){
        return $this->hasMany('App\Majelis','dewan_hakim_2','id_peserta');
  }

  public function dewan_hakim_3(){
        return $this->hasMany('App\Majelis','dewan_hakim_3','id_peserta');
  }

  public function panitera_1(){
        return $this->hasMany('App\Majelis','panitera_1','id_peserta');
  }

  public function panitera_2(){
        return $this->hasMany('App\Majelis','panitera_2','id_peserta');
  }

  public function majelis_peserta(){
        return $this->hasMany('App\MajelisPeserta','no_peserta','no_peserta');
  }


}
