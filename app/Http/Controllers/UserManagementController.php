<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller 
{
    // Fungsi untuk menampilkan tabel semua user (Halaman 14 & 17)
    public function index()
    {
        $users = [
            ['nama' => 'Ahmad Fikri Hanif', 'npm' => '2317051061', 'jurusan' => 'Ilmu Komputer', 'prodi' => 'S1 Ilmu Komputer'],
            ['nama' => 'Ilham Kurniawan', 'npm' => '2317051071', 'jurusan' => 'Ilmu Komputer', 'prodi' => 'S1 Ilmu Komputer'],
            ['nama' => 'David Mel Gibson Sianturi', 'npm' => '2217051120', 'jurusan' => 'Ilmu Komputer', 'prodi' => 'S1 Ilmu Komputer'],
            ['nama' => 'Muhammad Rofiq', 'npm' => '2217051098', 'jurusan' => 'Ilmu Komputer', 'prodi' => 'S1 Ilmu Komputer'],
        ];

        // Mengirim data array ke view 'user-management' [cite: 158]
        return view('user-management', compact('users'));
    }

    // Fungsi tambahan untuk Postest: Mengirim Data Melalui Parameter Route (Halaman 16)
    public function viewData($nama = " ", $npm = " ", $jurusan = " ", $prodi = " ")
    {
        // Memanggil view 'detail-user' dan mengirimkan parameter individu 
        return view('detail-user', compact('nama', 'npm', 'jurusan', 'prodi'));
    }
}