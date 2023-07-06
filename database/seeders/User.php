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
                'username' => $nama[$i],
                'password' => Hash::make(strtolower($nama[$i]. '_123')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        UserSeeder::factory()->count(25)->create();
    }
}
