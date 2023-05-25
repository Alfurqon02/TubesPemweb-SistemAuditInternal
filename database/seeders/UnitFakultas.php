<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitFakultas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = ['Fakultas Ilmu Teknologi dan Sains Data',
        'Fakultas Ilmu Pengetahuan Alam',
        'Fakultas Teknik',
        'Fakultas Seni Rupa dan Desain',
        'Fakultas Keolahragaan',
        'Fakultas Psikologi',
        'Fakultas Pertanian',
        'Fakultas Kedokteran',
        'Fakultas Ilmu Sosial dan Politik',
        'Fakultas Ekonomi dan Bisnis',
        'Fakultas Hukum',
        'Fakultas Ilmu Budaya',
        'Fakultas Keguruan dan Ilmu Pendidikan',
        ];
        for($i = 0; $i < sizeof($nama); $i++){
            DB::table('unit_fakultas')->insert([
                'nama' => $nama[$i],
                'ketua_unit' => null,
                'nip_ketua_unit' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
