<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Perbaikan extends Model
{
    protected $table = 'perbaikan';
    protected $guarded = [];

//    public function transaksi_1(){
 //     return $this->hasOne('App\Transaksi_1');
  //}

    public function aset(){
        return $this->belongsTo('App\Aset', 'aset_id');
    }
//    public function aset(){
  //      return $this->hasOne('App\Aset');
    //}

   
}