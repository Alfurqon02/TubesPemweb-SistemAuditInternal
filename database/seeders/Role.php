<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role as RoleModel;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'guests', 'display_name' => 'Guests', 'description' => 'Guest Users'],
            ['name' => 'administrator', 'display_name' => 'Administrator', 'description' => 'User dapat membuat periode audit dan menunjuk ketua auditor'],
            ['name' => 'ketua_auditor', 'display_name' => 'Ketua Auditor', 'description' => 'User dapat menginputkan auditor di audit yang diketuainya'],
            ['name' => 'auditor', 'display_name' => 'Auditor', 'description' => 'User dapat setup parameter standar luang lingkup, setup file yang harus diunggah oleh auditee, mengisi kondisi awal sampai follow up hasil temuan,  cetak hasil audit, closing hasil audit'],
            ['name' => 'auditee', 'display_name' => 'Auditee', 'description' => 'User dapat memberi feedback, mengisi rencana tindak lanjut, mengunggah file sesuai setup, mencetak hasil audit'],
        ];

        foreach ($roles as $role) {
            RoleModel::create([
                'name' => $role['name'],
                'display_name' => $role['display_name'],
                'description' => $role['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}