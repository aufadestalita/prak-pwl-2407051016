<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            [
                'nama_mk' => 'Pemrograman Web Lanjut',
                'sks' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_mk' => 'Keamanan Sistem Informasi',
                'sks' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_mk' => 'Struktur Data',
                'sks' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}