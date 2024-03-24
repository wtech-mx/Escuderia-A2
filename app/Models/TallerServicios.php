<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallerServicios extends Model
{
    use HasFactory;
    protected $table = "taller_servicios";
    protected $primarykey = "id";

    protected $fillable = [
        'servicio',
        'precio',
    ];
}
