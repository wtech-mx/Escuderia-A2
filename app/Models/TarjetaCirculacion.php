<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetaCirculacion extends Model
{
    use HasFactory;

    protected $table = "tarjeta_circulacion";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'current_auto',
        'nombre',
        'tipo_placa',
        'lugar_expedicion',
        'fecha_emision',
    ];

    protected $guarded=[

    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

        public function Automovil()
    {
       return $this->belongsTo(Automovil::class,'current_auto');
    }

}
