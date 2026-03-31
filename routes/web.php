<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
Route::get('/user-management/create', [UserManagementController::class, 'create'])->name('user-management.create');