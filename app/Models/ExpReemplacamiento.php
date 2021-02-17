<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpReemplacamiento extends Model
{
    use HasFactory;

    protected $table = "exp_reemplacamiento";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'reemplacamiento',
    ];

    protected $guarded=[

    ];
}
