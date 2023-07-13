<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    protected $table = 'roles';

    protected $guarded = ['id'];

    public function roleUser()
    {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
}