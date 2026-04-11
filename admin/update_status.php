<?php
include '../db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    mysqli_query($conn, "UPDATE complaints SET status='$status', admin_remark='$remark' WHERE id='$id'");
    header('Location: view_complaints.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Complaint</title>
    <link rel="stylesheet" href="update_status.css">
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
        <h1>Update Complaint Status</h1>
        <p>Review the complaint progress and provide an official admin remark.</p>
    </section>

    <section class="form-section">
        <form method="POST" class="update-form">
            <label>Complaint Status</label>
            <select name="status">
                <option>Pending</option>
                <option>In Progress</option>
                <option>Resolved</option>
                <option>Rejected</option>
            </select>

            <label>Admin Remark</label>
            <textarea name="remark" placeholder="Enter admin remark"></textarea>

            <button type="submit">Update Complaint</button>
        </form>
    </section>

    <script src="update_status.js"></script>
</body>
</html>