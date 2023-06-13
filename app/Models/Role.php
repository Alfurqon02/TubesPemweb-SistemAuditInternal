<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    public $guarded = ['id'];

    public function roleUser(){
        return $this->hasMany(User::class,'id_role', 'id');
    }
}
