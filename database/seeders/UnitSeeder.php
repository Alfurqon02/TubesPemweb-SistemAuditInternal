<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = ['Fakultas Ilmu Teknologi dan Sains Data',
        'Informatika',
        'Sains Data',
        'Fakultas Ilmu Pengetahuan Alam',
        'Matematika',
        'Statistika',
        'Kimia',
        'Fisika',
        'Biologi',
        'Farmasi',
        'Ilmu Lingkungan',
        'Fakultas Teknik',
        'Arsitektur',
        'Perencanaan Wilayah dan Kota',
        'Teknik Elektro',
        'Teknik Kimia',
        'Teknik Mesin',
        'Teknik Sipil',
        'Teknik Industri',
        'Fakultas Seni Rupa dan Desain',
        'Desain Interior',
        'Desain Komunikasi Visual',
        'Kriya Seni',
        'Seni Rupa Murni',
        'Fakultas Keolahragaan',
        'Pendidikan Jasmani, Kesehatan, dan Rekreasi',
        'Pendidikan Kepelatihan Olahraga',
        'Fakultas Psikologi',
        'Psikologi',
        'Fakultas Pertanian',
        'Agribisnis',
        'Agroteknologi',
        'Ilmu Tanah',
        'Penyuluhan dan Komunikasi Pertanian',
        'Peternakan',
        'Ilmu Teknologi Pangan',
        'Pengelolaan Hutan',
        'Fakultas Kedokteran',
        'Kedokteran',
        'Fakultas Ilmu Sosial dan Politik',
        'Hubungan Internasional',
        'Administrasi Negara',
        'Ilmu Komunikasi',
        'Sosiologi',
        'Fakultas Ekonomi dan Bisnis',
        'Akuntansi',
        'Ekonomi Pembangunan',
        'Manajemen',
        'Bisnis Digital',
        'Fakultas Hukum',
        'Ilmu Hukum',
        'Fakultas Ilmu Budaya',
        'Ilmu Sejarah',
        'Sastra Arab',
        'Sastra Daerah',
        'Sastra Indonesia',
        'Sastra Inggris',
        'Bahasa Mandarin dan Kebudayaan Tiongkok',
        'Fakultas Keguruan dan Ilmu Pendidikan',
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
        $parent_id = [1, 1, 1, 4, 4, 4, 4, 4, 4, 4, 4, 12, 12, 12, 12, 12, 12, 12, 12, 20, 20, 20, 20, 20, 25, 25, 25, 28, 28, 30, 30, 30, 30, 30, 30, 30, 30, 38, 38, 40, 40, 40, 40, 40, 45, 45, 45, 45, 45, 50, 50, 52, 52, 52, 52, 52, 52, 52, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59];
        for($i = 0; $i < sizeof($nama) && $i < sizeof($parent_id); $i++){
            DB::table('unit')->insert([
                'parent_id' => $parent_id[$i],
                'nama' => $nama[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
