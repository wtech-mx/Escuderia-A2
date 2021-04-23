<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llantas extends Model
{
    use HasFactory;

    protected $table = "llantas";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_mecanica',
        'id_user',
        'title',
        'description',
        'color',
        'estatus',
        'image',
        'check',
        'start',
        'end',

    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }
}
