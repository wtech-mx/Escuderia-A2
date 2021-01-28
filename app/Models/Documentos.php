<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $table = "documentos";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'fecha_expedicion',
        'fecha_vencimiento',
        'lugar_expedicion',
    ];

    protected $guarded=[

    ];
}
