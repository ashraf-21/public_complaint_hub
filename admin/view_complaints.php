 <?php
session_start();
include("../db.php");

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$admin_name = $_SESSION['user'];

$result = mysqli_query($conn, "SELECT * FROM complaints ORDER BY id DESC");

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Complaints</title>
    <link rel="stylesheet" href="view_complaints.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">🛡 Admin Panel</div>

        <ul class="nav-links">
            <li><a href="../home.php">Home</a></li>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li>
                <input type="text" id="searchInput" placeholder="Search by Complaint ID">
            </li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Admin Name Section -->
    <div class="admin-info">
        Welcome Admin: <strong><?php echo $admin_name; ?></strong>
    </div>

    <div class="table-container">
        <h2>All Public Complaints</h2>

        <table id="complaintTable">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Location</th>
                <th>Evidence</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['location']; ?></td>

                <td>
                    <?php if (!empty($row['image'])) { ?>
                        <img src="../<?php echo $row['image']; ?>" alt="Complaint Image">
                    <?php } else { ?>
                        No Image
                    <?php } ?>
                </td>

                <td><?php echo $row['status']; ?></td>

                <td>
                    <a class="update-btn" href="update_status.php?id=<?php echo $row['id']; ?>">Update</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <script src="view_complaints.js"></script>
</body>
</html>