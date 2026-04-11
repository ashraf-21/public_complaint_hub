<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">📢 User Portal</div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="raise_complaint.php">Raise Complaint</a></li>
            <li><a href="my_complaints.php">My Complaints</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
        <p>Manage your complaints, track progress, and stay updated with admin responses.</p>
    </section>

    <section class="dashboard-grid">
        <div class="card">
            <h2>Raise Complaint</h2>
            <p>Submit a new issue with full details, category, and supporting proof.</p>
            <a href="raise_complaint.php">Open Form</a>
        </div>

        <div class="card">
            <h2>My Complaints</h2>
            <p>Track complaint statuses, admin remarks, and resolution progress.</p>
            <a href="my_complaints.php">View History</a>
        </div>

        <div class="card">
            <h2>Secure Logout</h2>
            <p>Safely end your user session after checking your complaints.</p>
            <a href="logout.php">Logout</a>
        </div>
    </section>

    <script src="home.js"></script>
</body>
</html>