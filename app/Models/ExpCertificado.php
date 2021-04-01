<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpCertificado extends Model
{
    use HasFactory;

    protected $table = "exp_certificado";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'certificado',
    ];
}
