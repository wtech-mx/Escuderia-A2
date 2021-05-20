<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MecanicaUsuario extends Model
{
    use HasFactory;

    protected $table = "mecanica_usuario";
    protected $primarykey = "id";

    protected $fillable = [
        'id_mecanica',
        'id_usuario',
        'id_automovil',
    ];

    protected $guarded = [];

    public function Mecanica()
    {
        return $this->belongsTo(Mecanica::class, 'id_mecanica');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function Automovil()
    {
        return $this->belongsTo(Automovil::class, 'id_automovil');
    }
}
