<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;
    protected $table = "taller";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'vendedor',
        'refaccion',
        'cantidad',
        'importe_unitario',
        'importe_total',
        'mano_obra',
        'total',
    ];

    public function Cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion');
    }
}
