<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}
?>
<h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
<a href="raise_complaint.php">Raise Complaint</a><br><br>
<a href="my_complaints.php">My Complaints</a><br><br>
<a href="logout.php">Logout</a>