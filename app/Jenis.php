<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $guarded = [];

    public function aset(){
        return $this->hasMany('App\Aset');
    }
    public function kebutuhan(){
        return $this->hasMany('App\Kebutuhan');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}