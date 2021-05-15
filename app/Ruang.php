<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $guarded = [];

    public function aset(){
        return $this->hasMany('App\Aset');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}