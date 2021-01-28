<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguros extends Model
{
    use HasFactory;

    protected $table = "seguros";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'fecha_expedicion',
        'fecha_vencimiento',
        'tipo_cobertura',
        'costo',
        'costo_anual',
    ];

    protected $guarded=[

    ];
}
