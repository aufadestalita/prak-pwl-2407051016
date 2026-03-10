<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel (sesuaikan dengan migration: 'user')
    protected $table = 'user';

    // Kolom yang boleh diisi
    protected $fillable = ['nama', 'npm', 'kelas_id'];
}