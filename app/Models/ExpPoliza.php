<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpPoliza extends Model
{
    use HasFactory;

    protected $table = "exp_poliza";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'poliza',
    ];

    protected $guarded=[

    ];
}
