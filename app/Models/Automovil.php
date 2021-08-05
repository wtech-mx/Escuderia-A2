<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    use HasFactory;

    protected $table = "automovil";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'id_marca',
        'estatus',
        'tipo',
        'kilometraje',
        'subtipo',
        'año',
        'numero_serie',
        'color',
        'placas',
        'kilometraje',
    ];

    //     public function scopeSubmarca($query,$submarca)
    // {
    //     if ($submarca)
    //         return $query->where('submarca','LIKE',"%$submarca%");
    // }

    //     public function scopePlacas($query,$placas)
    // {
    //     if ($placas)
    //         return $query->where('placas','LIKE',"%$placas%");
    // }

    protected $guarded=[

    ];

    public function Marca()
    {
       return $this->belongsTo(Marca::class,'id_marca');
    }


    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

    public function UserEmpresa()
    {
       return $this->belongsTo(User::class,'id_empresa');
    }

    public function Seguros()
    {
       return $this->belongsTo(Seguros::class,'id_user');
    }

    public function ExpFactura()
    {
       return $this->hasMany(ExpFactura::class,'current_auto');
    }

    public function ExpTenencias()
    {
       return $this->hasMany(ExpTenencias::class,'current_auto');
    }

    public function ExpTc()
    {
       return $this->hasMany(ExpTc::class,'current_auto');
    }

    public function ExpDomicilio()
    {
       return $this->hasMany(ExpDomicilio::class,'current_auto');
    }

    public function ExpCertificado()
    {
       return $this->hasMany(ExpCertificado::class,'current_auto');
    }

    public function ExpCarta()
    {
       return $this->hasMany(ExpCarta::class,'current_auto');
    }

    public function ExpIne()
    {
       return $this->hasMany(ExpIne::class,'current_auto');
    }

    public function ExpPlacas()
    {
       return $this->hasMany(ExpPlacas::class,'current_auto');
    }

    public function ExpPoliza()
    {
       return $this->hasMany(ExpPoliza::class,'current_auto');
    }

    public function ExpReemplacamiento()
    {
       return $this->hasMany(ExpReemplacamiento::class,'current_auto');
    }

    public function ExpRfc()
    {
       return $this->hasMany(ExpRfc::class,'current_auto');
    }

    public function ExpInventario()
    {
       return $this->hasMany(ExpInventario::class,'current_auto');
    }

}
