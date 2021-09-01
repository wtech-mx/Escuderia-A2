<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguros extends Model
{
    use HasFactory;

    protected $table = "seguros";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_empresa',
        'seguro',
        'fecha_expedicion',
        'start',
        'end',
        'image',
        'tipo_cobertura',
        'costo',
        'costo_anual',
        'current_auto',
    ];

    public static function except(string $string)
    {
    }

    public function scopeSeguro($query, $seguro)
    {
        if ($seguro)
            return $query->where('seguro', 'LIKE', "%$seguro%");
    }

    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Sectores()
    {
        return $this->belongsTo(Sectores::class, 'id_sector');
    }

    public function UserEmpresa()
    {
        return $this->belongsTo(User::class, 'id_empresa');
    }

    public function Automovil()
    {
        return $this->belongsTo(Automovil::class, 'current_auto');
    }
}
