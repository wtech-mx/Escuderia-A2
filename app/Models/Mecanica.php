<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanica extends Model
{
    use HasFactory;

    protected $table = "mecanica";
    protected $primarykey = "id";

    protected $fillable = [
        /* User/Auto Llantas */
        'id_user',
        'id_empresa',
        'current_auto',
        'current_auto2',

        /* User/Auto Banda */
        'id_userbn',
        'id_empresabn',
        'current_autobn',
        'current_autobn2',

        /* User/Auto aceite */
        'id_userac',
        'id_empresaac',
        'current_autoac',
        'current_autoac2',

         /* User/Auto afinacion */
        'id_useraf',
        'id_empresaaf',
        'current_autoaf',
        'current_autoaf2',

         /* User/Auto amortiguadores */
        'id_useram',
        'id_empresaam',
        'current_autoam',
        'current_autoam2',

        /* User/Auto bateria */
        'id_userbt',
        'id_empresabt',
        'current_autobt',
        'current_autobt2',

        /* User/Auto frenos */
        'id_userfr',
        'id_empresafr',
        'current_autofr',
        'current_autofr2',

        /* User/Auto Otro */
        'id_userot',
        'id_empresaot',
        'current_autoot',
        'current_autoot2',

        'servicio',
        'llantas_delanteras',
        'llantas_traseras',
        'amortig_delanteras',
        'amortig_traseras',
        'frenos_delanteras',
        'frenos_traseras',
        'descripcion',
        'vida_llantas',
        'km_actual',
        'km_estimado',

    ];

    protected $guarded=[

    ];
    /* Llantas */
    public function User(){
       return $this->belongsTo(User::class, 'id_user');
    }
    public function Automovil2(){
       return $this->belongsTo(Automovil::class,'current_auto2');
    }
    public function Empresa(){
       return $this->belongsTo(Empresa::class, 'id_empresa');
    }
    public function Automovil(){
       return $this->belongsTo(Automovil::class,'current_auto');
    }


    /* Banda */
    public function Userbn(){
       return $this->belongsTo(User::class, 'id_userbn');
    }
    public function Empresabn(){
       return $this->belongsTo(Empresa::class, 'id_empresabn');
    }
    public function Automovilbn(){
       return $this->belongsTo(Automovil::class,'current_autobn');
    }
    public function Automovilbn2(){
       return $this->belongsTo(Automovil::class,'current_autobn2');
    }


    public function Userfr(){
       return $this->belongsTo(User::class, 'id_userfr');
    }
    public function Userac(){
       return $this->belongsTo(User::class, 'id_userac');
    }
    public function Useraf(){
       return $this->belongsTo(User::class, 'id_useraf');
    }
    public function Useram(){
       return $this->belongsTo(User::class, 'id_useram');
    }
    public function Userbt(){
       return $this->belongsTo(User::class, 'id_userbt');
    }
    public function Userot(){
       return $this->belongsTo(User::class, 'id_userot');
    }


    public function Automovilfr(){
       return $this->belongsTo(Automovil::class,'current_autofr');
    }
    public function Automovilac(){
       return $this->belongsTo(Automovil::class,'current_autoac2');
    }
    public function Automovilaf(){
       return $this->belongsTo(Automovil::class,'current_autoaf2');
    }
    public function Automovilam(){
       return $this->belongsTo(Automovil::class,'current_autoam2');
    }
    public function Automovilbt(){
       return $this->belongsTo(Automovil::class,'current_autobt');
    }
    public function Automovilot(){
       return $this->belongsTo(Automovil::class,'current_autoot');
    }
}
