<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'telefono',
        'edad',
        'direccion',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion uno a muchos
    public function automovil(){
        return $this->hasMany('App\Models\Automovil');
    }
    public function documentos(){
        return $this->hasMany('App\Models\Documentos');
    }
    public function expediente(){
        return $this->hasMany('App\Models\ExpedientesFisicos');
    }
    public function estetica(){
        return $this->hasMany('App\Models\Estetica');
    }
    public function gestoria(){
        return $this->hasMany('App\Models\Gestoria');
    }
    public function mecanica(){
        return $this->hasMany('App\Models\Mecanica');
    }
    public function foto(){
        return $this->hasMany('App\Models\FotosVehiculo');
    }
}
