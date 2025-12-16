document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    if (username === 'admin' && password === 'admin') {
        window.location.href = window.dashboardUrl;
    } else {
        alert('Invalid credentials');
    }
});