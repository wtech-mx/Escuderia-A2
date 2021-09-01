<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verificacion extends Model
{
    use HasFactory;

    protected $table = "verificacion";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_empresa',
        'current_auto',
        'primer_semestre',
        'segundo_semestre',
        'title',
        'descripcion',
        'color',
        'start',
        'check',
        'end',
        'image',
        'estatus',
        'device_token',
    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

    public function UserEmpresa()
    {
       return $this->belongsTo(User::class,'id_empresa');
    }
    public function Sectores()
    {
        return $this->belongsTo(Sectores::class, 'id_sector');
    }

        public function Automovil()
    {
       return $this->belongsTo(Automovil::class,'current_auto');
    }

        public function TarjetaCirculacion()
    {
       return $this->belongsTo(TarjetaCirculacion::class,'id_tc');
    }

}
