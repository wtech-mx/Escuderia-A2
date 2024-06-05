<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    use HasFactory;
    protected $table = "orden_servicio";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'total',
        'km_actual',
        'km_taller',
        'km_entrega',
        'ubicacion',
        'descripcion_problema',
        'estatus',
        'titulo_img',
        'img',
        'fecha_creacion',
        'fecha_asignacion_taller',
        'fecha_ingreso_taller',
        'fecha_cotizacion',
        'fecha_autorizada',
        'fecha_reparado',
        'fecha_entregado',
        'fecha_factura',
        'fecha_pagado',
        'id_empresa',
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
