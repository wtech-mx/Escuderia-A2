<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectores extends Model
{
    use HasFactory;
    protected $table = "sectores";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'sector',
        'id_empresa',
    ];
}
