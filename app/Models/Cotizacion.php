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
        'id_empresa',
        'descripcion',
        'total',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Empresa()
    {
        return $this->belongsTo(User::class, 'id_empresa');
    }

}
