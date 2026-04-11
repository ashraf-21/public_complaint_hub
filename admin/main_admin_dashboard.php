<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'main_admin') {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Admin Dashboard</title>
    <link rel="stylesheet" href="main_admin_dashboard.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo"> Main Admin Panel</div>
        <ul class="nav-links">
            <li><a href="main_admin_dashboard.php">Dashboard</a></li>
            <li><a href="view_complaints.php">Complaints</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Main Admin Dashboard</h1>
        <p>Manage admins, monitor complaints, and control the entire complaint portal system.</p>
    </section>

    <section class="dashboard-grid">
        <div class="card">
            <h2>Create New Admin</h2>
            <p>Add new admins and assign them system privileges.</p>
            <a href="create_admins.php">Open</a>
        </div>

        <div class="card">
            <h2>View Admins</h2>
            <p>Monitor existing admins and review their activity access.</p>
            <a href="view_admins.php">Open</a>
        </div>

        <div class="card">
            <h2>All Complaints</h2>
            <p>Access every complaint registered by users in the system.</p>
            <a href="view_complaints.php">Open</a>
        </div>
    </section>

    <script src="main_admin_dashboard.js"></script>
</body>
</html>