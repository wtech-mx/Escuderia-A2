<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosLugarExp extends Model
{
    use HasFactory;

    protected $table = "documentos_lugarexp";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'lugar_expedicion',
    ];

    protected $guarded=[

    ];
}
