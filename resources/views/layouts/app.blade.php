<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Film</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Font Awesome -->
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
      flex: 1;
    }

    footer {
      margin-top: auto;
    }

    .footer-custom {
      background-color: #6c757d;
      color: white;
      padding: 15px 0;
      text-align: center;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .footer-custom:hover {
      background-color: #5a6268;
    }

    .footer-custom i {
      margin-right: 6px;
      color: #ffc107;
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('movies.index') }}">🎥 Movie DB</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Menu Navigasi -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-semibold text-white" href="{{ route('movies.index') }}">
            <i class="bi bi-house-door"></i> Home
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link fw-semibold text-white" href="{{ route('movies.table') }}">
            <i class="bi bi-table"></i> Data Film
          </a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link fw-semibold text-white" href="{{ route('movies.create') }}">
            <i class="bi bi-plus-circle"></i> Tambah Film
          </a>
        </li>
        @endauth


        <!-- Dropdown Login / Logout -->
      @auth
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <form action="{{ route('logout') }}" method="POST" class="dropdown-item m-0 p-0">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                  <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
      @else
      <a href="{{ route('login') }}" class="btn btn-light">
        <i class="bi bi-box-arrow-in-right"></i> Masuk
      </a>
      @endauth
      </ul>


      <!-- Form Pencarian -->
      <form class="d-flex me-3" method="GET" action="{{ route('movies.index') }}">
        <input class="form-control me-2" type="search" name="search" placeholder="Cari film..." aria-label="Search" />
        <button class="btn btn-warning" type="submit"><i class="bi bi-search"></i></button>
      </form>


    </div>
  </div>
</nav>

<!-- Main Content -->
<main class="container">
  {{-- Pesan sukses --}}
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

  {{-- Konten utama --}}
  @yield('content')
</main>

<!-- Footer -->
<footer class="footer-custom">
  <div class="container">
    <i class="fas fa-university"></i>
    &copy; {{ date('Y') }} Politeknik Negeri Padang &mdash; Manajemen Informatika.
  </div>
</footer>

<!-- Alert auto-hide -->
<script>
  setTimeout(() => {
    const alert = document.querySelector('.alert');
    if (alert) {
      alert.classList.remove('show');
      alert.classList.add('fade');
      setTimeout(() => alert.remove(), 300);
    }
  }, 5000);
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
