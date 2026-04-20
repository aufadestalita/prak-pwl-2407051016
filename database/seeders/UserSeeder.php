<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelas;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $kelasA = Kelas::firstOrCreate(['nama_kelas' => 'A']);
        $kelasB = Kelas::firstOrCreate(['nama_kelas' => 'B']);

        $dosen = User::firstOrCreate([
            'npm' => '1234567890',
        ], [
            'name' => 'DosenIlkomp',
            'email' => 'dosen@mail.com',
            'password' => bcrypt('password123'),
            'kelas_id' => $kelasB->id
        ]);

        $dosen->assignRole('dosen');

        $mahasiswa = User::firstOrCreate([
            'npm' => '1234567891',
        ], [
            'name' => 'MahasiswaIlkomp',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('password123'),
            'kelas_id' => $kelasA->id
        ]);

        $mahasiswa->assignRole('mahasiswa');
    }
}