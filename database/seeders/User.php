<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User as UserModel;
use App\Models\Role;
use App\Models\User as UserSeeder;


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
        for($i = 0; $i < sizeof($nama); $i++){
            DB::table('users')->insert([
                'email' => strtolower($nama[$i] . '@staff.uns.ac.id'),
                'display_name' => $nama[$i] . ' S.Kom',
                'id_unit' => mt_rand(1, 68),
                'username' => $nama[$i],
                'nip' => mt_rand(1000000000000000, 9999999999999999),
                'password' => Hash::make(strtolower($nama[$i]. '_123')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // UserSeeder::factory()->count(50)->create();



        // Buat akun Administrator
        UserModel::create([
            'email' => 'admin@example.com',
            'username' => 'admin',
            'id_unit' => mt_rand(1, 68),
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'administrator')->first());

        // Buat akun Ketua Auditor
        UserModel::create([
            'email' => 'ketua_auditor@example.com',
            'username' => 'ketua_auditor',
            'id_unit' => mt_rand(1, 68),
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'ketua_auditor')->first());

        // Buat akun Auditor
        UserModel::create([
            'email' => 'auditor@example.com',
            'username' => 'auditor',
            'id_unit' => mt_rand(1, 68),
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'auditor')->first());

        // Buat akun Auditee
        UserModel::create([
            'email' => 'auditee@example.com',
            'username' => 'auditee',
            'id_unit' => mt_rand(1, 68),
            'nip' => Str::upper(Str::random(16)),
            'password' => Hash::make('password'),
        ])->roles()->attach(Role::where('name', 'auditee')->first());
    }
}
