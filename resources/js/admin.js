document.getElementById('adminLoginForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Hardcoded credentials for client-side check
    const correctUsername = 'admin';
    const correctPassword = 'admin';

    if (username === correctUsername && password === correctPassword) {
        // Redirect to the admin dashboard page
        window.location.href = '{{ route("dashboard") }}';
    } else {
        alert('Invalid credentials');
    }
});
