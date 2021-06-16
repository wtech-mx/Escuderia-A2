<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponUser extends Model
{
    use HasFactory;

    protected $table = "cupon_user";
    protected $primarykey = "id";

    protected $fillable = [
        'id_cupon',
        'id_user',
        'titulo',
        'descripcion',
        'check',
        'enviado',
        'end',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
