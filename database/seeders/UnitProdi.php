<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitProdi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = ['Pusat',
        'Informatika',
        'Sains Data',
        'Pusat',
        'Matematika',
        'Statistika',
        'Kimia',
        'Fisika',
        'Biologi',
        'Farmasi',
        'Ilmu Lingkungan',
        'Pusat',
        'Arsitektur',
        'Perencanaan Wilayah dan Kota',
        'Teknik Elektro',
        'Teknik Kimia',
        'Teknik Mesin',
        'Teknik Sipil',
        'Teknik Industri',
        'Pusat',
        'Desain Interior',
        'Desain Komunikasi Visual',
        'Kriya Seni',
        'Seni Rupa Murni',
        'Pusat',
        'Pendidikan Jasmani, Kesehatan, dan Rekreasi',
        'Pendidikan Kepelatihan Olahraga',
        'Pusat',
        'Psikologi',
        'Pusat',
        'Agribisnis',
        'Agroteknologi',
        'Ilmu Tanah',
        'Penyuluhan dan Komunikasi Pertanian',
        'Peternakan',
        'Ilmu Teknologi Pangan',
        'Pengelolaan Hutan',
        'Pusat',
        'Kedokteran',
        'Pusat',
        'Hubungan Internasional',
        'Administrasi Negara',
        'Ilmu Komunikasi',
        'Sosiologi',
        'Pusat',
        'Akuntansi',
        'Ekonomi Pembangunan',
        'Manajemen',
        'Bisnis Digital',
        'Pusat',
        'Ilmu Hukum',
        'Pusat',
        'Ilmu Sejarah',
        'Sastra Arab',
        'Sastra Daerah',
        'Sastra Indonesia',
        'Sastra Inggris',
        'Bahasa Mandarin dan Kebudayaan Tiongkok',
        'Pusat',
        'Bimbingan dan Konseling',
        'Pendidikan Administrasi Perkantoran',
        'Pendidikan Akuntansi',
        'Pendidikan Bahasa dan Sastra Indonesia',
        'Pendidikan Bahasa Inggris',
        'Pendidikan Bahasa Jawa',
        'Pendidikan Biologi',
        'Pendidikan Ekonomi',
        'Pendidikan Fisika',
        'Pendidikan Geografi',
        'Pendidikan Guru PAUD',
        'Pendidikan Guru SD',
        'Pendidikan Guru SD Kebumen',
        'Pendidikan IPA',
        'Pendidikan Kimia',
        'Pendidikan Luar Biasa',
        'Pendidikan Matematika',
        'Pendidikan Pancasila dan Kewarganegaraan',
        'Pendidikan Sejarah',
        'Pendidikan Seni Rupa',
        'Pendidikan Sosiologi Antropologi',
        'Pendidikan Teknik Bangunan',
        'Pendidikan TIK',
        'Pendidikan Teknik Mesin',
        ];

        $id_fakultas = [1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 10, 10, 11, 11, 11, 11, 11, 11, 11, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12];
        for($i = 0; $i < sizeof($nama) && $i < sizeof($id_fakultas); $i++){
            DB::table('unit_prodi')->insert([
                'nama' => $nama[$i],
                'ketua_unit' => null,
                'nip_ketua_unit' => null,
                'id_fakultas' => $id_fakultas[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
