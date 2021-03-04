<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    use HasFactory;

    protected $table = "automovil";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'id_marca',
        'estatus',
        'tipo',
        'kilometraje',
        'subtipo',
        'año',
        'numero_serie',
        'color',
        'placas',
        'kilometraje',
    ];

    protected $guarded=[

    ];

    public function Marca()
    {
       return $this->belongsTo(Marca::class,'id_marca');
    }


    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

    public function Empresa()
    {
       return $this->belongsTo(Empresa::class,'id_empresa');
    }

    public function Seguros()
    {
       return $this->belongsTo(Seguros::class,'id_user');
    }

}
