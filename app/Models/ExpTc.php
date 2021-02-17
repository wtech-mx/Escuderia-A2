<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpTc extends Model
{
    use HasFactory;

    protected $table = "exp_tc";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'tc',
    ];

    protected $guarded=[

    ];
}
