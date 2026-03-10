<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Postest</title>
    <style>
        /* Gaya untuk Body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h1 { color: #333; }

        /* Gaya Tabel */
        table {
            border-collapse: collapse;
            width: 90%;
            background-color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        /* Warna Header Tabel */
        th {
            background-color: #4CAF50; /* Warna Hijau */
            color: white;
            padding: 15px;
            text-align: left;
        }

        /* Warna Baris Tabel */
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        /* Warna Selang-seling (Zebra) */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Efek Hover (Berubah warna saat kursor lewat) */
        tr:hover {
            background-color: #e8f5e9;
            cursor: pointer;
        }

        .prodi-text {
            color: #2e7d32;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>
    

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Jurusan</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user['npm'] }}</td>
                <td>{{ $user['jurusan'] }}</td>
                <td class="prodi-text">{{ $user['prodi'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>