<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasolina extends Model
{
    use HasFactory;

    protected $table = "gasolina";
    protected $primarykey = "id";

    protected $fillable = [
        'id',
        'id_user',
        'id_empresa',
        'id_sector',
        'current_auto',
        'taque_inicial',
        'km_actual',
        'importe',
        'litros',
        'gasolina',
        'tipo_pago',
        'estatus',
        'km_recorridos',
        'cantidad_final',
        'consumo',
        'odometro',
        'ticket',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Sectores()
    {
        return $this->belongsTo(Sectores::class, 'id_sector');
    }

    public function UserEmpresa()
    {
        return $this->belongsTo(User::class, 'id_empresa');
    }

    public function Automovil()
    {
        return $this->belongsTo(Automovil::class, 'current_auto');
    }
}
