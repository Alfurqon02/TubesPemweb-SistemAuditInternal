<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Administrator', 'Auditor', 'Auditee', 'Ketua Auditor'];
        for($i = 0; $i < sizeof($roles); $i++){
            DB::table('roles')->insert([
                'name' => str_replace(' ', '_', strtolower($roles[$i])),
                'display_name' => $roles[$i],
                'description' => $roles[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
