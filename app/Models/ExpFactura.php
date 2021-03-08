<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpFactura extends Model
{
    use HasFactory;

    protected $table = "exp_facturas";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'factura',
    ];



    protected $guarded=[

    ];
}
