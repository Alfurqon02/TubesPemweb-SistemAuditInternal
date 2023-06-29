<?php

namespace Database\Seeders;

use App\Models\User;
use Laratrust\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'administrator',
                'display_name' => 'Administrator',
                'description' => 'Can access all features!'
            ],
            [
                'name' => 'ketua_auditor',
                'display_name' => 'Ketua Auditor',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'auditee',
                'display_name' => 'auditee',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'auditor',
                'display_name' => 'Auditor',
                'description' => 'Can access limited features!'
            ],
        ];

        foreach ($roles as $key => $value) {
            $role = Role::create([
                'name' => $value['name'],
                'display_name' => $value['display_name'],
                'description' => $value['description']
            ]);

            User::first()->attachRole($role);
    }
}
}
