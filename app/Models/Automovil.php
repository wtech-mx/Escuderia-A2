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


    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }

}
