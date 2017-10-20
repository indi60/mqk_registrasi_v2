<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pengguna', 'email', 'password', 'tlp', 'nik', 'role', 'spesifik_akses', 'kafilah_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role == 'admin_pusat';
    }

    public function isAdminPusat()
    {
      return $this->role == 'admin_pusat';
    }

    public function isKafilah()
    {
      return $this->role == 'kafilah';
    }

    public function isOperatorRegistrasi(){
        return $this->role == 'operator_registrasi';   
    }

    public function isPanitera(){
        return $this->role == 'panitera';   
    }

    public function isPaniteraKitab(){
        return $this->role == 'panitera_kitab';   
    }

    public function getNamaProvinsi(){
      return Provinsi::findOrFail($this->spesifik_akses);
    }
}
