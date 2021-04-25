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
           'titulo',
           'nombre',
           'garantia',
           'marca',
           'proveedor',
           'mano_o',
           'costo',
           'costo_total',
           'cantidad',
    ];

    protected $guarded=[

    ];
}
