<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestoria extends Model
{
    use HasFactory;

    protected $table = "gestoria";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'id_marca',
        'tramite',
    ];

    protected $guarded=[

    ];
}
