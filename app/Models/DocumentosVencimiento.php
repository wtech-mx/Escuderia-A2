<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosVencimiento extends Model
{
    use HasFactory;

    protected $table = "documentos_vencimiento";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'fecha_vencimiento',
        'img',
    ];

    protected $guarded=[

    ];

    public function User()
    {
       return $this->belongsTo(User::class,'id_user');
    }

}
