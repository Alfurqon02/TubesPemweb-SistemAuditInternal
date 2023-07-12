<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User as UserModel;
use App\Models\Role;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Rama', 'Azzam', 'Furqon', 'Hilda'];
        foreach ($nama as $namaUser) {
            DB::table('users')->insert([
                'email' => strtolower($namaUser . '@staff.uns.ac.id'),
                'username' => $namaUser,
                'nip' => Str::upper(Str::random(16)),
                'password' => Hash::make(strtolower($namaUser . '_123')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // Buat akun Administrator
        UserModel::create([
            'email' => 'admin@example.com',
            'username' => 'admin',
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'administrator')->first());

        // Buat akun Ketua Auditor
        UserModel::create([
            'email' => 'ketua_auditor@example.com',
            'username' => 'ketua_auditor',
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'ketua_auditor')->first());

        // Buat akun Auditor
        UserModel::create([
            'email' => 'auditor@example.com',
            'username' => 'auditor',
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'auditor')->first());

        // Buat akun Auditee
        UserModel::create([
            'email' => 'auditee@example.com',
            'username' => 'auditee',
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'auditee')->first());
    }
}