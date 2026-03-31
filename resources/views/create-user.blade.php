@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
    <div>
        <h2 class="fw-bold" style="color: #1a4d3e;">Registrasi Mahasiswa Baru</h2>
        <p class="text-muted small mb-0">Lengkapi formulir di bawah untuk menambah data</p>
    </div>
</div>

<form action="{{ route('user-management.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label fw-bold text-secondary">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" style="border-radius: 8px;" placeholder="Contoh: Muhammad Fikri" required>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold text-secondary">NPM</label>
        <input type="text" name="npm" class="form-control" style="border-radius: 8px;" placeholder="Contoh: 2317051001" required>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold text-secondary">Pilih Kelas</label>
        <select name="kelas_id" class="form-select" style="border-radius: 8px;" required>
            <option value="" selected disabled>-- Pilih Kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex gap-2 justify-content-end pt-3">
        <a href="{{ route('user-management.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
            Kembali
        </a>
        <button type="submit" class="btn text-white btn-sm fw-bold" style="background-color: #2a9d8f; border-radius: 8px; border: none; padding: 8px 15px;">
            Simpan Data Baru
        </button>
    </div>
</form>
@endsection