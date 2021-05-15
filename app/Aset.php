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
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function perbaikan(){
        return $this->hasMany('App\Perbaikan');
    }
}