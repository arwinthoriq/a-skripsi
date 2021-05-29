<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'akses'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ruang(){
        return $this->hasMany('App\Ruang');
    }
    public function jenis(){
        return $this->hasMany('App\Jenis');
    }   
     
    public function aset(){
        return $this->hasMany('App\Aset');
    } 
    public function perbaikan(){
        return $this->hasMany('App\Perbaikan');
    }
    public function kebutuhan(){
        return $this->hasMany('App\Kebutuhan');
    }
}
