<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallerOrden extends Model
{
    use HasFactory;
    protected $table = "taller_orden";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'nombre_taller',
        'encargado',
        'telefono',
        'correo',
        'direccion',
        'fecha',
    ];

    public function Cotizacion()
    {
        return $this->belongsTo(TallerCotizacion::class, 'id_cotizacion');
    }
}
