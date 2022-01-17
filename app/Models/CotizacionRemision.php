<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionRemision extends Model
{
    use HasFactory;
    protected $table = "cotizacion_remision";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'reparacion',
        'mano',
        'importe',
        'aprobacion',
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
