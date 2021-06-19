<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetaCirculacion extends Model
{
    use HasFactory;
    protected $table = "tarjeta_circulacion";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_empresa',
        'current_auto',
        'id_tc',
        'nombre',
        'tipo_placa',
        'lugar_expedicion',
        'fecha_emision',
        'num_placa',
        'image',
        'title',
        'descripcion',
        'color',
        'start',
        'check',
        'end',
        'device_token',
    ];

        public function scopeNombre($query,$nombre)
    {
        if ($nombre)
            return $query->where('nombre','LIKE',"%$nombre%");
    }


    protected $guarded=[

    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }
        public function UserEmpresa()
    {
       return $this->belongsTo(User::class,'id_empresa');
    }

        public function Automovil()
    {
       return $this->belongsTo(Automovil::class,'current_auto');
    }

        public function ImgTc()
    {
       return $this->belongsTo(ImgTc::class,'id_tc');
    }

}
