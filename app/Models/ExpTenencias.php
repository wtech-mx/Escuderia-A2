<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpTenencias extends Model
{
    use HasFactory;

    protected $table = "exp_tenencias";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'tenencia',
    ];

    protected $guarded=[

    ];
}
