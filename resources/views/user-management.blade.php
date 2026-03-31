@extends('layouts.app')

@section('title', 'User Management - Postest')

@section('content')
<style>
   
    .table-custom {
        border-collapse: collapse;
        width: 100%;
        background-color: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table-custom th {
        background-color: #4CAF50; 
        color: white;
        padding: 15px;
        text-align: left;
    }

    .table-custom td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    .table-custom tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-custom tr:hover {
        background-color: #e8f5e9;
        cursor: pointer;
    }

    .prodi-text {
        color: #2e7d32;
        font-weight: bold;
    }
</style>

<div class="text-center mb-4">
    <h1 class="fw-bold">Daftar Mahasiswa</h1>
</div>

<div class="table-responsive">
    <table class="table-custom">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->npm }}</td>
                <td class="prodi-text">{{ $user->nama_kelas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection