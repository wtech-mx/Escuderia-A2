<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpCarta extends Model
{
    use HasFactory;

    protected $table = "exp_carta";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'carta',
    ];

    protected $guarded=[

    ];
}
