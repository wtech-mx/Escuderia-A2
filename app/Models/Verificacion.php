<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verificacion extends Model
{
    use HasFactory;

    protected $table = "verificacion";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_tc',
        'title',
        'descripcion',
        'color',
        'start',
        'end',
        'status',
    ];
}
