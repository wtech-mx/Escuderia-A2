<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MecanicaProveedores extends Model
{
    use HasFactory;

    protected $table = "mecanica_proveedores";
    protected $primarykey = "id";

    protected $fillable = [
        'garantia',
        'proveedor',
        'costo',
        'mano_o',
        'nombre',
    ];

    protected $guarded=[

    ];
}
