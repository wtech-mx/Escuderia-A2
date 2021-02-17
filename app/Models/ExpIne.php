<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpIne extends Model
{
    use HasFactory;

    protected $table = "exp_ine";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'ine',
    ];

    protected $guarded=[

    ];
}
