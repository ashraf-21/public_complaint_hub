<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>
<h1>Admin Dashboard</h1>
<a href="view_complaints.php">View All Complaints</a><br><br>
<a href="../logout.php">Logout</a>