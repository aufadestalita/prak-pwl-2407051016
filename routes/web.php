<?php

use Illuminate\Support\Facades\Route;
// 1. Tambahkan baris ini untuk memanggil Controller yang sudah kamu buat
use App\Http\Controllers\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// 2. Tambahkan route untuk halaman utama User Management (Modul Hal. 14)
Route::get('/user-management', [UserManagementController::class, 'index']);

// 3. Tambahkan route untuk halaman Detail User dengan parameter (Modul Hal. 18)
Route::get('/detail-user/{nama}/{npm}/{jurusan}/{prodi}', [UserManagementController::class, 'viewData']);