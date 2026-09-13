<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Donor Darah')</title>
    
    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">
    
    <!-- Navbar Sederhana -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Donor Darah UDD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Navigasi ini masih dummy, akan kita sesuaikan per role nantinya -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Area Konten Utama -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer Sederhana -->
    <footer class="text-center py-4 text-muted">
        <small>&copy; {{ date('Y') }} Sistem Informasi Donor Darah UDD. Tugas Mata Kuliah Basis Data.</small>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>