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

<body class="d-flex flex-column min-vh-100">

    <!-- Top navbar with hamburger for mobile -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button id="sidebarToggle" class="btn btn-outline-light d-none d-md-inline-block me-2" type="button" aria-label="Toggle sidebar">☰</button>
            <a class="navbar-brand ms-2" href="{{ route('dashboard') }}">Admin Dashboard</a>
        </div>
    </nav>

<div class="d-flex flex-grow-1">
    <!-- Sidebar (desktop) -->
    <div class="sidebar bg-primary text-white p-3 d-none d-md-block" style="width: 250px; height: 100vh; position: fixed; overflow-y: auto;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <span class="label">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('department.*') ? 'active' : '' }}" href="{{ route('department.index') }}">
                    <span class="label">Departments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('student.*') ? 'active' : '' }}" href="{{ route('student.index') }}">
                    <span class="label">Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('professor.*') ? 'active' : '' }}" href="{{ route('professor.index') }}">
                    <span class="label">Professors</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('enrollment.*') ? 'active' : '' }}" href="{{ route('enrollment.index') }}">
                    <span class="label">Enrollments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('course.*') ? 'active' : '' }}" href="{{ route('course.index') }}">
                    <span class="label">Courses</span>
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger" href="{{ route('home.index') }}" onclick="return confirm('Are you sure you want to log out?')">
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
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-primary text-white" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="list-group-item list-group-item-action bg-primary text-white" href="{{ route('department.index') }}">Departments</a>
            <a class="list-group-item list-group-item-action bg-primary text-white" href="{{ route('student.index') }}">Students</a>
            <a class="list-group-item list-group-item-action bg-primary text-white" href="{{ route('professor.index') }}">Professors</a>
            <a class="list-group-item list-group-item-action bg-primary text-white" href="{{ route('enrollment.index') }}">Enrollments</a>
            <a class="list-group-item list-group-item-action bg-primary text-white" href="{{ route('course.index') }}">Courses</a>
            <a class="list-group-item list-group-item-action list-group-item-danger" href="{{ route('home.index') }}" onclick="return confirm('Are you sure you want to log out?')">Log out</a>
        </div>
    </div>
</div>

<!-- Small inline CSS to keep desktop main-content offset from fixed sidebar on md+ -->
<style>
    @media (min-width: 768px) {
        .main-content { margin-left: 250px; }
    }
</style>
<style>
    /* Collapsible sidebar styles */
    .sidebar { transition: width .15s ease; }
    body.sidebar-collapsed .sidebar { width: 80px !important; }
    body.sidebar-collapsed .sidebar .label { display: none; }
    body.sidebar-collapsed .sidebar .nav-link { text-align: center; }
    @media (min-width: 768px) {
        body.sidebar-collapsed .main-content { margin-left: 80px; }
    }
</style>

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <script>
        // Restore sidebar state from localStorage
        (function(){
            const collapsed = localStorage.getItem('adminSidebarCollapsed') === '1';
            if(collapsed){ document.body.classList.add('sidebar-collapsed'); }

            const btn = document.getElementById('sidebarToggle');
            if(btn){
                btn.addEventListener('click', function(){
                    document.body.classList.toggle('sidebar-collapsed');
                    const now = document.body.classList.contains('sidebar-collapsed') ? '1' : '0';
                    localStorage.setItem('adminSidebarCollapsed', now);
                });
            }
        })();
    </script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (function(){
            const ctx = document.getElementById('overviewChart');
            if(!ctx) return;

            const counts = {
                students: {{ $students ?? 0 }},
                courses: {{ $courses ?? 0 }},
                professors: {{ $professors ?? 0 }},
                departments: {{ $departments ?? $departmentsCount ?? 0 }},
                enrollments: {{ $enrollment ?? 0 }}
            };

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Students','Courses','Professors','Departments','Enrollments'],
                    datasets: [{
                        label: 'Counts',
                        data: [counts.students, counts.courses, counts.professors, counts.departments, counts.enrollments],
                        backgroundColor: ['#0d6efd','#198754','#ffc107','#6c757d','#0dcaf0']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, precision: 0 } }
                }
            });
        })();
    </script>

</body>
</html>
