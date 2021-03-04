<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alertas extends Model
{
    use HasFactory;

    protected $table = "Alertas";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'titulo',
        'descripcion',
        'img',
        'tiempo',
    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

    public function Empresa()
    {
       return $this->belongsTo(Empresa::class,'id_empresa');
    }

}