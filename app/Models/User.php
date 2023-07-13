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
    'email',
    'password',
    'nip',
    'username',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'user', 'role_user');
    }

    public function attachRole($role)
    {
        $role = $role === 'guests' ? null : $role;
        $role = Role::where('name', $role)->first();
        if ($role) {
            $this->roles()->attach($role);
        }
    }
}