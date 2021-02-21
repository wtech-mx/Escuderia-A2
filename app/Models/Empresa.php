<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresa";
    protected $primarykey = "id";

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'referencia',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $guarded=[

    ];

    public function Automovil()
    {
        //relationship of many users to many posts
        return $this->hasMany(Automovil::class);
    }
}
