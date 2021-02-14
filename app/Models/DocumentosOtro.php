<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosOtro extends Model
{
    use HasFactory;

    protected $table = "documentos_otro";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'otro',
    ];

    protected $guarded=[

    ];
}
