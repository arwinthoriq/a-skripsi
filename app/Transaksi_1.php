<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi_1 extends Model
{
    protected $table = 'transaksi_1';
    protected $guarded = [];

    public function aset(){
        return $this->belongsTo('App\Aset', 'aset_id');
    }

    public function perbaikan(){
        return $this->belongsTo('App\Perbaikan', 'perbaikan_id');
    }



   
}