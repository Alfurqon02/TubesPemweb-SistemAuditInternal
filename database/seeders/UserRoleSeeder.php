<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
public function run()
{
// Menambahkan peran Administrator
Role::create([
'name' => 'ADMINISTRATOR',
'display_name' => 'Administrator',
'description' => 'Administrator Role',
]);

// Menambahkan peran Ketua Auditor
Role::create([
'name' => 'KETUA_AUDITOR',
'display_name' => 'Ketua Auditor',
'description' => 'Ketua Auditor Role',
]);

// Menambahkan peran Auditor
Role::create([
'name' => 'AUDITOR',
'display_name' => 'Auditor',
'description' => 'Auditor Role',
]);

// Menambahkan peran Auditee
Role::create([
'name' => 'AUDITEE',
'display_name' => 'Auditee',
'description' => 'Auditee Role',
]);

// Menambahkan peran Guests
Role::create([
'name' => 'GUESTS',
'display_name' => 'Guests',
'description' => 'Guests Role',
]);
}
}