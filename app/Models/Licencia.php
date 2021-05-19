<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    protected $table = "licencia";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'tipo',
        'expedicion',
        'antiguedad',
        'nacionalidad',
        'sangre',
        'rfc',
        'nombre',
        'vigencia',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}