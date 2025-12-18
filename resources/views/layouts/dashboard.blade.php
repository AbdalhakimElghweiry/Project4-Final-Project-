<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | University Portal Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Top navbar with hamburger for mobile -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#adminSidebar" aria-controls="adminSidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button id="sidebarToggle" class="btn btn-outline-light d-none d-md-inline-block me-2" type="button"
                aria-label="Toggle sidebar">☰</button>
            <a class="navbar-brand ms-2" href="{{ route('dashboard') }}">Admin Dashboard</a>
        </div>
    </nav>

    <div class="d-flex flex-grow-1">
        <!-- Sidebar (desktop) -->
        <div class="sidebar bg-primary text-white p-3 d-none d-md-block"
            style="width: 250px; height: 100vh; position: fixed; overflow-y: auto;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="label">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('department.*') ? 'active' : '' }}"
                        href="{{ route('department.index') }}">
                        <span class="label">Departments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('student.*') ? 'active' : '' }}"
                        href="{{ route('student.index') }}">
                        <span class="label">Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('professor.*') ? 'active' : '' }}"
                        href="{{ route('professor.index') }}">
                        <span class="label">Professors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('enrollment.*') ? 'active' : '' }}"
                        href="{{ route('enrollment.index') }}">
                        <span class="label">Enrollments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('course.*') ? 'active' : '' }}"
                        href="{{ route('course.index') }}">
                        <span class="label">Courses</span>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a class="nav-link text-danger" href="{{ route('home.index') }}"
                        onclick="return confirm('Are you sure you want to log out?')">
                        <span class="label">Log out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <main class="py-4 container">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-3 mt-auto">
        <div class="container text-center">
            <small class="text-muted">
                © {{ date('Y') }} University Portal — All Rights Reserved.
            </small>
        </div>
    </footer>

    <!-- Offcanvas sidebar for mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
        <div class="offcanvas-header bg-primary text-white">
            <h5 class="offcanvas-title" id="adminSidebarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action bg-primary text-white"
                    href="{{ route('dashboard') }}">Dashboard</a>
                <a class="list-group-item list-group-item-action bg-primary text-white"
                    href="{{ route('department.index') }}">Departments</a>
                <a class="list-group-item list-group-item-action bg-primary text-white"
                    href="{{ route('student.index') }}">Students</a>
                <a class="list-group-item list-group-item-action bg-primary text-white"
                    href="{{ route('professor.index') }}">Professors</a>
                <a class="list-group-item list-group-item-action bg-primary text-white"
                    href="{{ route('enrollment.index') }}">Enrollments</a>
                <a class="list-group-item list-group-item-action bg-primary text-white"
                    href="{{ route('course.index') }}">Courses</a>
                <a class="list-group-item list-group-item-action list-group-item-danger"
                    href="{{ route('home.index') }}" onclick="return confirm('Are you sure you want to log out?')">Log
                    out</a>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>




</body>

</html>