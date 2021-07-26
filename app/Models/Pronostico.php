<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronostico extends Model
{
    use HasFactory;
    protected $table = "pronostico";
    protected $fillable = [
        'id_user',
        'id_empresa',
        'title',
        'descripcion',
        'image',
        'color',
        'start',
        'end',
        'status',
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
