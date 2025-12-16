<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | University Portal</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                University Portal
            </a>

            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}" 
                            href="{{ route('home.index') }}"
                        >
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('department.*') ? 'active' : '' }}"
                            href="{{ route('department.index') }}"
                        >
                            Departments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}"
                            href="{{ route('student.index') }}"
                        >
                            Students
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('professors.*') ? 'active' : '' }}"
                            href="{{ route('professor.index') }}"
                        >
                            Professors
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}"
                            href="{{ route('enrollment.index') }}"
                        >
                            Enrollments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}"
                            href="{{ route('course.index') }}"
                        >
                            Courses
                        </a>
                    </li>

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('home.about') ? 'active' : '' }}" 
                            href="{{ route('home.about') }}"
                        >
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('home.contact') ? 'active' : '' }}" 
                            href="{{ route('home.contact') }}"
                        >
                            Contact
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
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

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
