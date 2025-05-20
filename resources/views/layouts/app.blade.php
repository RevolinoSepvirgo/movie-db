<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1; /* agar main mengambil ruang tersisa */
        }

        footer {
            margin-top: auto; /* dorong footer ke bawah */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-success bg-success mb-4">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('movies.index') }}">🎥 Movie db</a>
        </div>
    </nav>

    <main class="container">
        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Konten utama --}}
        @yield('content')
    </main>

    <footer class="bg-success text-black py-3">
        <div class="container text-center">
            &copy; {{ date('Y') }} Politeknik Negeri Padang--Manajemen Informatika.
        </div>
    </footer>

    <script>
        // Hapus alert setelah 5 detik
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 300);
            }
        }, 5000);
    </script>
</body>
</html>
