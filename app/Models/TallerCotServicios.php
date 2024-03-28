<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallerCotServicios extends Model
{
    use HasFactory;
    protected $table = "taller_cotservicios";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'id_servicio',
        'subtotal',
    ];

    public function Servicio()
    {
        return $this->belongsTo(TallerServicios::class, 'id_servicio');
    }
}
