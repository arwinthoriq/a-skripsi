<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Kebutuhan extends Model
{
    protected $table = 'kebutuhan';
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





}