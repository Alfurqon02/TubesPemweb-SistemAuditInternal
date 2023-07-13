<?php


namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User as UserSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        UserSeeder::factory()->count(50)->create();
    }
}
