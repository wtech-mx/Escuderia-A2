<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpDomicilio extends Model
{
    use HasFactory;

    protected $table = "exp_domicilio";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'domicilio',
    ];

    protected $guarded=[

    ];
}
