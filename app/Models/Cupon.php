<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $table = "cupon";
    protected $primarykey = "id";

    protected $fillable = [
        'titulo',
        'color',
        'aplicacion',
        'qr',
        'precio',
        'estado',
    ];
}
