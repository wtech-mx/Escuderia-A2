<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = "marca";
    protected $primarykey = "id";

    protected $fillable = [
        'nombre',
    ];

    protected $guarded=[

    ];


        public function Automovil()
    {
       return $this->belongsTo(Automovil::class);
    }

}
