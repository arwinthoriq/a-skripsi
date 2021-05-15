<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Perbaikan extends Model
{
    protected $table = 'perbaikan';
    protected $guarded = [];

    public function aset(){
        return $this->belongsTo('App\Aset', 'aset_id');
    }
}