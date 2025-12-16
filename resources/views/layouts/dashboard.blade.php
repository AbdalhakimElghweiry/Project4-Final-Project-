<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | University Portal Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>

<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-primary text-white p-3" style="width: 250px; height: 100vh; position: fixed; overflow-y: auto;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('department.*') ? 'active' : '' }}" href="{{ route('department.index') }}">
                    Departments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('student.*') ? 'active' : '' }}" href="{{ route('student.index') }}">
                    Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('professor.*') ? 'active' : '' }}" href="{{ route('professor.index') }}">
                    Professors
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('enrollment.*') ? 'active' : '' }}" href="{{ route('enrollment.index') }}">
                    Enrollments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('course.*') ? 'active' : '' }}" href="{{ route('course.index') }}">
                    Courses
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger" href="{{ route('home.index') }}" onclick="return confirm('Are you sure you want to log out?')">
                    Log out
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-grow-1" style="margin-left: 250px;">
        <main class="py-4">
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
    </div>
</div>

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
