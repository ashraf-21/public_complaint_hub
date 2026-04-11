<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Admin Panel</div>
        <ul class="nav-links">
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="view_complaints.php">Complaints</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Admin Dashboard</h1>
        <p>Monitor complaints, review user issues, and manage complaint resolutions efficiently.</p>
    </section>

    <section class="dashboard-grid">
        <div class="card">
            <h2>View All Complaints</h2>
            <p>Access every complaint assigned to the admin panel and update statuses.</p>
            <a href="view_complaints.php">Open Complaints</a>
        </div>

        <div class="card">
            <h2>Complaint Workflow</h2>
            <p>Track complaint progress from pending to resolved with proper remarks.</p>
            <a href="view_complaints.php">Track Workflow</a>
        </div>

        <div class="card">
            <h2>Quick Logout</h2>
            <p>Securely end the current admin session when work is completed.</p>
            <a href="../logout.php">Logout</a>
        </div>
    </section>

    <script src="admin_dashboard.js"></script>
</body>
</html>