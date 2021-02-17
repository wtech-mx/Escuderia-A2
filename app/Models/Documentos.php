<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $table = "documentos_exp";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'fecha_expedicion',
        'img',
    ];

    protected $guarded=[

    ];
}
