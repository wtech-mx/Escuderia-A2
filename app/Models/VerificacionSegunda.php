<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificacionSegunda extends Model
{
    use HasFactory;

    protected $table = "verificacion_segunda";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_verificacion',
        'segundo_semestre',
        'title',
        'description',
        'color',
        'estatus',
        'check',
        'start',
        'end',

    ];
}
