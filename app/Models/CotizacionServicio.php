<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionServicio extends Model
{
    use HasFactory;
    protected $table = "cotizacion_servicio";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'servicio',
        'pieza',
        'cantidad',
        'mano_o',
        'subtotal',
    ];

    public function Cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion');
    }
}
