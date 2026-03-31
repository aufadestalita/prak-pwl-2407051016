@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
    <div>
        <h2 class="fw-bold" style="color: #1a4d3e;">🌿 Database Mahasiswa</h2>
        <p class="text-muted small mb-0">Manajemen data pengguna yang rapi dan estetik</p>
    </div>
    <a href="{{ route('user-management.create') }}" class="btn text-white fw-bold shadow-sm" style="background-color: #2a9d8f; border-radius: 12px;">
        + Tambah Data
    </a>
</div>

<form action="{{ route('user-management.index') }}" method="GET" class="row g-2 mb-4">
    <div class="col-md-5">
        <input type="text" name="search" class="form-control" placeholder="Cari Nama atau NPM..." value="{{ request('search') }}" style="border-radius: 10px;">
    </div>
    <div class="col-md-3">
        <select name="filter_kelas" class="form-select" style="border-radius: 10px;">
            <option value="">Semua Kelas</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}" {{ request('filter_kelas') == $k->id ? 'selected' : '' }}>Kelas {{ $k->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-dark w-100" style="border-radius: 10px;">Cari</button>
    </div>
    <div class="col-md-2">
        <a href="{{ route('user-management.index') }}" class="btn btn-outline-secondary w-100" style="border-radius: 10px;">Reset</a>
    </div>
</form>

<div class="table-responsive bg-white p-3 rounded-4 shadow-sm">
    <table class="table table-hover align-middle">
        <thead style="background-color: #f0f7f4; color: #1a4d3e;">
            <tr>
                <th class="p-3">ID (UUID)</th>
                <th class="p-3">Nama</th>
                <th class="p-3">NPM</th>
                <th class="p-3">Kelas</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td class="p-3 small text-muted" style="font-family: monospace; font-size: 0.75rem;">{{ $user->id }}</td>
                <td class="p-3 fw-bold">{{ $user->name }}</td>
                <td class="p-3 text-secondary">{{ $user->npm }}</td>
                <td class="p-3">
                    <span class="badge" style="background-color: #d1eae1; color: #0d664c;">Kelas {{ $user->kelas->nama_kelas ?? 'N/A' }}</span>
                </td>
                <td class="p-3">
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-sm btn-outline-success" style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                            Edit
                        </button>
                        
                        <form action="{{ route('user-management.destroy', $user->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4 text-muted">Data tidak ditemukan...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>

@foreach ($users as $user)
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px; border: none; overflow: hidden;">
            <div class="modal-header text-white" style="background-color: #0d664c;">
                <h5 class="modal-title fw-bold">Update Data Mahasiswa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user-management.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" style="border-radius: 10px;" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">NPM</label>
                        <input type="text" name="npm" class="form-control" style="border-radius: 10px;" value="{{ $user->npm }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Kelas</label>
                        <select name="kelas_id" class="form-select" style="border-radius: 10px;" required>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $user->kelas_id ? 'selected' : '' }}>
                                    Kelas {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="border-radius: 8px;">Batal</button>
                    <button type="submit" class="btn text-white btn-sm fw-bold" style="background-color: #2a9d8f; border-radius: 8px; border: none; padding: 8px 20px;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection