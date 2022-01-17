<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalRemision extends Model
{
    use HasFactory;
    protected $table = "total_remisions";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'total_cotizacion',
        'total_remision',
        'fecha_cotizacion',
        'fecha_remision',
    ];

    public function Cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion');
    }

    public function Taller()
    {
        return $this->belongsTo(Taller::class, 'id_taller');
    }
}
