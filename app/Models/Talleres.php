<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    use HasFactory;
    protected $table = "talleres";
    protected $primarykey = "id";

    protected $fillable = [
        'nombre_taller',
        'encargado',
        'telefono',
        'correo',
        'estado',
        'delegacion',
        'direccion',
    ];
}
