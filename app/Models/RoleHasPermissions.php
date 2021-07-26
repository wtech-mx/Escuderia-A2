<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{

    use HasFactory;
    protected $table = "role_has_permissions";
    public $timestamps = false;

    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    public function Role()
    {
        return $this->hasMany(Role::class, 'role_id');
    }
}
