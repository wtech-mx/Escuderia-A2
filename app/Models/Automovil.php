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
        'tipo',
        'version',
        'puertas',
        'numero_serie',
        'placas',
        'kilometraje',
    ];

    protected $guarded=[

    ];

    //Relacion muchos a uno
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
