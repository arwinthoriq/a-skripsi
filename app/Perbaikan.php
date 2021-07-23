<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Perbaikan extends Model
{
    protected $table = 'perawatan'; //perbaikan
    protected $guarded = [];
   // public function getDates() {
     // return array('created_at', 'updated_at', 'date_time_field');
   // }

//    public function transaksi_1(){
 //     return $this->hasOne('App\Transaksi_1');
  //}

    public function aset(){
        return $this->belongsTo('App\Aset', 'aset_id');
    }
    public function user(){
      return $this->belongsTo('App\User', 'user_id');
  }
//    public function aset(){
  //      return $this->hasOne('App\Aset');
    //}

   
}