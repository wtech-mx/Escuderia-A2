<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alertas extends Model
{
    use HasFactory;

    protected $table = "alertas";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_empresa',
        'titulo',
        'descripcion',
        'img',
        'color',
        'start',
        'end',
        'status',
    ];

    public function scopeTitulo($query,$titulo)
    {
        if ($titulo)
            return $query->where('titulo','LIKE',"%$titulo%");
    }

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

    public function UserEmpresa()
    {
        return $this->belongsTo(User::class, 'id_empresa');
    }

}
