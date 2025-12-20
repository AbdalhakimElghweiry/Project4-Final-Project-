<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | University Portal</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Public CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                University Portal
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                            href="{{ route('home.index') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.about') ? 'active' : '' }}"
                            href="{{ route('home.about') }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.contact') ? 'active' : '' }}"
                            href="{{ route('home.contact') }}">
                            Contact
                        </a>
                    </li>

                </ul>
            </div>

            <a href="{{ route('admin.login') }}" class="btn btn-outline-light ms-3 {{ request()->routeIs('admin.login') ? 'active' : '' }}">Admin Login</a>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow-1 py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light py-3 mt-5">
        <div class="container text-center">
            <small class="text-muted">
                © {{ date('Y') }} University Portal — All Rights Reserved.
            </small>
        </div>
    </footer>

    <!-- Admin login moved to its own page at /adminLogin -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>