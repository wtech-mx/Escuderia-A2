<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgTc extends Model
{
    use HasFactory;

    protected $table = "img_tcs";
    protected $primarykey = "id";

    protected $fillable = [
        'id_tc',
        'img',
    ];

    protected $guarded=[

    ];

        public function TarjetaCirculacion()
    {
       return $this->belongsTo(TarjetaCirculacion::class,'id_tc');
    }

}
