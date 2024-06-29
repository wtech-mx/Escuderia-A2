<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenEncuesta extends Model
{
    use HasFactory;
    protected $table = "orden_encuesta";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'id_taller',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'pregunta_4',
        'pregunta_5',
        'pregunta_6',
        'pregunta_7',
        'pregunta_8',
        'pregunta_9',
        'pregunta_10',
        'fecha',
    ];

    public function OrdenServicio()
    {
        return $this->belongsTo(OrdenServicio::class, 'id_cotizacion');
    }
    public function Talleres()
    {
        return $this->belongsTo(Talleres::class, 'id_taller');
    }
}
