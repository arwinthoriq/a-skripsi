<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Aset extends Model
{
    protected $table = 'aset';
    protected $guarded = [];

    public function ruang(){
        return $this->belongsTo('App\Ruang', 'ruang_id');
    }
    public function jenis(){
        return $this->belongsTo('App\Jenis', 'jenis_id');
    }
    public function kategori(){
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
    public function pegawai(){
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

//    public function transaksi_1(){
//        return $this->hasOne('App\Transaksi_1');
//    }
    
    public function perbaikan(){
        return $this->hasMany('App\Perbaikan');
    }
//    public function perbaikan(){
  //      return $this->belongsTo('App\Perbaikan', 'perbaikan_id');
    //}





}