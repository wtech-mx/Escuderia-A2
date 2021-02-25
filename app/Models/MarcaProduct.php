<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarcaProduct extends Model
{
    use HasFactory;

    protected $table = "marca_product";
    protected $primarykey = "id";

    protected $fillable = [
        'nombre',
    ];

    protected $guarded=[

    ];
}
