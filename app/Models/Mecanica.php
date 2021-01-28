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
        'llantas_delanteras',
        'llantas_traseras',
        'id_marca',
        'descripcion',
        'garantia',
        'vida_llantas',
        'km_actual',
    ];

    protected $guarded=[

    ];
}
