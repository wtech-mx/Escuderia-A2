<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenComentarios extends Model
{
    use HasFactory;
    protected $table = "orden_ser_comentarios";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'estatus',
        'comentario',
        'fecha',
    ];

    public function OrdenServicio()
    {
        return $this->belongsTo(OrdenServicio::class, 'id_cotizacion');
    }
}
