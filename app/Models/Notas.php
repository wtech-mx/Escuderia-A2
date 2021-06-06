<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $table = "notas";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'nota',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre)
            return $query->where('id_user', 'LIKE', "%$nombre%");
    }
}
