<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primarykey = "id";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'guard_name',
    ];

    public function RolePermissions()
    {
        return $this->belongsTo(RolePermissions::class, 'role_id');
    }

    public function RoleHasPermissions(){
        return $this->hasMany(RoleHasPermissions::class);
    }
}
