document.getElementById('adminLoginForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    if (username === 'admin' && password === 'admin') {
        window.location.href = window.dashboardUrl;
    } else {
        alert('Invalid credentials');
    }
});

// Restore sidebar state from localStorage
(function () {
    const collapsed = localStorage.getItem('adminSidebarCollapsed') === '1';
    if (collapsed) { document.body.classList.add('sidebar-collapsed'); }

    const btn = document.getElementById('sidebarToggle');
    if (btn) {
        btn.addEventListener('click', function () {
            document.body.classList.toggle('sidebar-collapsed');
            const now = document.body.classList.contains('sidebar-collapsed') ? '1' : '0';
            localStorage.setItem('adminSidebarCollapsed', now);
        });
    }
})();

// Chart.js Statistics
(function () {
    const initChart = (id, type) => {
        const ctx = document.getElementById(id);
        if (!ctx) return;

        // Read counts from data attribute
        const countsData = ctx.dataset.counts;
        let counts = { students: 0, courses: 0, professors: 0, departments: 0, enrollments: 0 };

        if (countsData) {
            try {
                counts = JSON.parse(countsData);
            } catch (e) {
                console.error("Error parsing chart data for " + id, e);
            }
        }

        new Chart(ctx, {
            type: type,
            data: {
                labels: ['Students', 'Courses', 'Professors', 'Departments', 'Enrollments'],
                datasets: [{
                    label: 'Counts',
                    data: [counts.students, counts.courses, counts.professors, counts.departments, counts.enrollments],
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#6c757d', '#0dcaf0']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: type === 'bar' ? { y: { beginAtZero: true, precision: 0 } } : {}
            }
        });
    };

    initChart('overviewChart', 'bar');
    initChart('pieChart', 'pie');
})();