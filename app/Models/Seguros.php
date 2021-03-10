<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguros extends Model
{
    use HasFactory;

    protected $table = "seguros";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'seguro',
        'start',
        'end',
        'tipo_cobertura',
        'costo',
        'costo_anual',
        'current_auto',
    ];

        public function scopeSeguro($query,$seguro)
    {
        if ($seguro)
            return $query->where('seguro','LIKE',"%$seguro%");
    }

    protected $guarded=[

    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

    public function Empresa()
    {
       return $this->belongsTo(Empresa::class,'id_empresa');
    }

        public function Automovil()
    {
       return $this->belongsTo(Automovil::class,'current_auto');
    }

}
