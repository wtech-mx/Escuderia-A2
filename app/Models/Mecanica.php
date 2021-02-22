<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanica extends Model
{
    use HasFactory;

    protected $table = "mecanica";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'current_auto',
        'servicio',
        'llantas_delanteras',
        'llantas_traseras',
        'id_marca',
        'descripcion',
        'garantia',
        'vida_llantas',
        'km_actual',
        'current_auto2',
    ];

    protected $guarded=[

    ];
}
