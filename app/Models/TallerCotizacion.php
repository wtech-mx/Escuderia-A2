<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallerCotizacion extends Model
{
    use HasFactory;
    protected $table = "taller_cotizacion";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'importe_sin',
        'importe_con',
        'comentarios',
        'estatus',
        'fecha_creacion',
        'fecha_atorizacion',
        'fecha_reparacion',
        'fecha_entregar',
        'fecha_factura',
        'fecha_pagado',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Auto()
    {
        return $this->belongsTo(Automovil::class, 'current_auto');
    }

    public function TallerOrden()
    {
        return $this->hasOne(TallerOrden::class, 'id_cotizacion');
    }
}
