<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;

    protected $fillable = [
<<<<<<< HEAD
=======
        'name',
>>>>>>> b347ec7d663f2c33a9dbd1d008454fb5f149f8a9
        'email',
        'password',
        'nip',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD
    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'user', 'role_user');
    }
=======
    // public function auditor(){
    //     return $this->hasMany(Post::class);
    // }

    // public function roleUser(){
    //     return $this->hasMany(RoleUser::class, 'id_user', 'id');
    // }

>>>>>>> b347ec7d663f2c33a9dbd1d008454fb5f149f8a9
}