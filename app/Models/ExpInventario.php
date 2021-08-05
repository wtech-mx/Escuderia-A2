<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpInventario extends Model
{
    use HasFactory;

    protected $table = "exp_inventario";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'id_empresa',
        'current_auto',
        'img',
    ];
}
