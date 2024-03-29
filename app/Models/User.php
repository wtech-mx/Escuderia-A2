<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class

User extends Authenticatable
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
        'estatus',
        'telefono',
        'fecha_nacimiento',
        'direccion',
        'referencia',
        'genero',
        'role',
        'email',
        'password',
        'id_key',
        'act_key',
        'device_token'

    ];
    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name', 'LIKE', "%$name%");
    }

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

    public function Sectores()
    {
        return $this->belongsTo(Sectores::class, 'id_sector');
    }

    public function Automovil()
    {
        //relationship of many users to many posts
        return $this->belongsTo(Automovil::class, 'current_auto');
    }

    public function DocumentosVencimiento()
    {
        //relationship of many users to many posts
        return $this->hasMany(DocumentosVencimiento::class);
    }

    public function Seguros()
    {
        return $this->hasMany(Seguros::class, 'id_user');
    }

    public function TarjetaCirculacion()
    {
        return $this->hasMany(TarjetaCirculacion::class, 'id_user');
    }

    public function ExpFactura()
    {
        return $this->hasMany(ExpFactura::class, 'id_user');
    }
}
