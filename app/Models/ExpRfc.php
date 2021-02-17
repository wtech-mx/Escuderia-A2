<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpRfc extends Model
{
    use HasFactory;

    protected $table = "exp_rfc";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'rfc',
    ];

    protected $guarded=[

    ];
}
