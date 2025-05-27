<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Film</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        .footer-custom {
  background-color: #6c757d; /* Abu-abu */
  color: white;
  padding: 15px 0;
  text-align: center;
  font-size: 14px;
  transition: background-color 0.3s ease;
}

.footer-custom:hover {
  background-color: #5a6268; /* Warna abu-abu lebih gelap saat hover */
}

.footer-custom i {
  margin-right: 6px;
  color: #ffc107; /* Warna ikon */
}

@media (prefers-color-scheme: dark) {
  .footer-custom {
    background-color: #343a40;
    color: #ccc;
  }
}

@media (prefers-color-scheme: light) {
  .footer-custom {
    background-color: #adb5bd;
    color: black;
  }
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

    <footer class="footer-custom">
  <div class="container">
    <i class="fas fa-university"></i>
    &copy; {{ date('Y') }} Politeknik Negeri Padang &mdash; Manajemen Informatika.
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
