<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role as RoleModel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roles = ['Guest','Administrator', 'Auditor', 'Auditee', 'Ketua Auditor'];
        // for($i = 0; $i < sizeof($roles); $i++){
        //     DB::table('roles')->insert([
        //         'name' => str_replace(' ', '_', strtolower($roles[$i])),
        //         'display_name' => $roles[$i],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        $administrator = RoleModel::create([
            'name' => 'administrator',
            'display_name' => 'Administrator', // optional
            'description' => 'User dapat membuat periode audit dan menunjuk ketua auditor', // optional
        ]);
        $ketua_auditor = RoleModel::create([
            'name' => 'ketua_auditor',
            'display_name' => 'Ketua Auditor', // optional
            'description' => 'User dapat menginputkan auditor di audit yang diketuainya', // optional
        ]);
        $auditor = RoleModel::create([
            'name' => 'auditor',
            'display_name' => 'Auditor', // optional
            'description' => 'User dapat setup parameter standar luang lingkup, setup file yang harus diunggah oleh auditee, mengisi kondisi awal sampai follow up hasil temuan,  cetak hasil audit, closing hasil audit', // optional
        ]);
        $auditee = RoleModel::create([
            'name' => 'auditee',
            'display_name' => 'Auditee', // optional
            'description' => 'User dapat memberi feedback, mengisi rencana tindak lanjut, mengunggah file sesuai setup, mencetak hasil audit', // optional
        ]);

    }
}
