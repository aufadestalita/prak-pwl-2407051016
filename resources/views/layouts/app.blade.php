<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - GreenCorp</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f0f4f0; /* Abu-abu kehijauan sangat muda */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Navbar Hijau Tua Estetik */
        .navbar-custom {
            background-color: #0d664c; /* Dark Emerald */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        /* Kartu Konten Utama */
        .main-card {
            background: white;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-top: -30px; /* Efek tumpuk di Navbar */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom pb-5">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                🌿 GreenUser Management
            </a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="main-card">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>