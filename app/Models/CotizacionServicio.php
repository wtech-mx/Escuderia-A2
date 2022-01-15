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
        'carroceria',
        'suspencion_d',
        'suspencion_t',
        'frenos_d',
        'frenos_t',
        'llantas_d',
        'llantas_t',
        'mangueras',
        'luces_d',
        'luces_t',
        'aceite',
        'afinacion_b',
        'afinacion_f',
        'otros',
        'observaciones',
    ];

    public function Cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion');
    }

    public function Taller()
    {
        return $this->belongsTo(Taller::class, 'id_taller');
    }
}
