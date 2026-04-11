<?php
session_start();
include("db.php");

// block direct access without login
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['user'];

// safer query
$stmt = $conn->prepare("SELECT id, subject, status, admin_remark FROM complaints WHERE user_email=? ORDER BY id DESC");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Complaints</title>
    <link rel="stylesheet" href="my_complaints.css">
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
        <h1>My Complaints</h1>
        <p>Track all complaints submitted by you along with admin remarks and progress updates.</p>
    </section>

    <section class="table-section">
        <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Admin Remark</th>
            </tr>

            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td>
                    <span class="status-badge">
                        <?= htmlspecialchars($row['status']) ?>
                    </span>
                </td>
                <td><?= htmlspecialchars($row['admin_remark'] ?: 'No remark yet') ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <div class="no-data">No complaints found.</div>
        <?php endif; ?>
    </section>

    <script src="my_complaints.js"></script>
</body>
</html>