<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionDiagnostico extends Model
{
    use HasFactory;
    protected $table = "cotizacion_diagnostico";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion_servicio',
        'liquido_f',
        'anticongelante',
        'aceite_d',
        'aceite_t',
        'limpia_p',
        'observaciones',
    ];
}
