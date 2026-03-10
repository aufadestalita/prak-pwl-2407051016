<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas; // PENTING: Import model Kelas di sini

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // Data yang akan dimasukkan
        $data = [
            ['nama_kelas' => 'A'],
            ['nama_kelas' => 'B'],
            ['nama_kelas' => 'C'],
            ['nama_kelas' => 'D'],
        ];

        // Masukkan data ke tabel kelas menggunakan Model
        foreach ($data as $item) {
            Kelas::create($item);
        }
    }
}