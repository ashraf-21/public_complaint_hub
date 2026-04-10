<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'main_admin') {
    header('Location: ../login.php');
    exit();
}
?>
<h1>Main Admin Dashboard</h1>
<a href="create_admin.php">Create Admin</a><br><br>
<a href="view_admins.php">View Admins</a><br><br>
<a href="view_complaints.php">All Complaints</a><br><br>
<a href="../logout.php">Logout</a>