<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $table = "key";
    protected $primarykey = "id";

    protected $fillable = [
        'id_empresa',
        'codigo',
        'estatus',
        'caducidad',
    ];


    protected $guarded=[

    ];

    public function Empresa()
    {
       return $this->belongsTo(User::class,'id_empresa');
    }
}
