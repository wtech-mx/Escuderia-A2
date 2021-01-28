<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estetica extends Model
{
    use HasFactory;

    protected $table = "estetica";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'id_marca',
        'interior',
        'exterior',
        'ambos',
        'descripcion',
    ];

    protected $guarded=[

    ];
}
