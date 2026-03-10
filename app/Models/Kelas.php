<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'kelas';

    // Menentukan kolom mana saja yang boleh diisi (mass assignment)
    protected $fillable = ['nama_kelas'];
}