<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NamaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = ['Laporan Keuangan', 'Laporan Operasional', 'Laporan Kepatuhan', 'Laporan Temuan Rekomendasi', 'Laporan Rencana Tindak Lanjut', 'Laporan Hasil Audit'];
        for($i = 0; $i < sizeof($nama); $i++){
            DB::table('jenis_file')->insert([
                'nama' => $nama[$i],
            ]);
    }
}
}
