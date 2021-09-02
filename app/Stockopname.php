<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Stockopname extends Model
{
    protected $table = 'stock_opname';
    protected $guarded = [];

    public function aset(){
        return $this->belongsTo('App\Aset', 'aset_id');
    }





}