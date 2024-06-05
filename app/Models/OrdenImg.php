<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenImg extends Model
{
    use HasFactory;
    protected $table = "orden_ser_img";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cotizacion',
        'estatus',
        'imagen',
        'fecha',
    ];

    public function OrdenServicio()
    {
        return $this->belongsTo(OrdenServicio::class, 'id_cotizacion');
    }
}
