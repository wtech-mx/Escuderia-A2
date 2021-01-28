<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedientesFisicos extends Model
{
    use HasFactory;

    protected $table = "expedientes_fisicos";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'facturas',
        'tenencias',
        'responsiva',
        'ine',
        'seguro',
        'circulacion',
        'reemplacamiento',
        'baja_placas',
        'domicilio',
        'rfc',
    ];

    protected $guarded=[

    ];
}
