<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpFactura extends Model
{
    use HasFactory;

    protected $table = "exp_facturas";
    protected $primarykey = "id";

    protected $fillable = [
        'id_user',
        'current_auto',
        'factura',
    ];

//        public function scopeName($query,$name)
//    {
//        if ($name)
//            return $query->where('name','LIKE',"%$name%");
//    }

    protected $guarded=[

    ];

//    public function User()
//    {
//       return $this->belongsTo(User::class,'id_user');
//    }

}
