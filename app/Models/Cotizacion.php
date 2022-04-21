<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = "cotizacion";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'descripcion',
        'fecha',
        'estatus',
        'video_motor',
        'video_cajuela',
        'video_exterior',
        'video_interior',
        'tarjeta',
        'verificacion',
        'poliza',
        'km',
        'manuales',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Automovil()
    {
        return $this->belongsTo(Automovil::class, 'current_auto');
    }
    public function CotizacionRemision()
    {
        return $this->hasOne(CotizacionRemision::class, 'id_cotizacion');
    }
    public function CotizacionServicio()
    {
        return $this->hasOne(CotizacionServicio::class, 'id_cotizacion');
    }
    public function Taller()
    {
        return $this->hasOne(Taller::class, 'id_cotizacion');
    }
    public function TotalRemision()
    {
        return $this->hasOne(TotalRemision::class, 'id_cotizacion');
    }
}
