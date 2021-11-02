<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = "cotizacion";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'descripcion',
        'fecha',
        'estatus',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Automovil()
    {
        return $this->belongsTo(Automovil::class, 'current_auto');
    }
}
