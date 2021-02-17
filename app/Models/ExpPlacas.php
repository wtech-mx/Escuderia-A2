<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpPlacas extends Model
{
    use HasFactory;

    protected $table = "exp_placas";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'placa',
    ];

    protected $guarded=[

    ];
}
