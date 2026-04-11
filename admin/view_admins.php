<?php
session_start();
include("../db.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'main_admin') {
    header("Location: ../login.php");
    exit();
}

// toggle active status
if (isset($_GET['toggle'])) {
    $id = intval($_GET['toggle']);

    $check = mysqli_query($conn, "SELECT is_active FROM users WHERE id='$id' AND role='admin'");
    $admin = mysqli_fetch_assoc($check);

    if ($admin) {
        $newStatus = $admin['is_active'] ? 0 : 1;
        mysqli_query($conn, "UPDATE users SET is_active='$newStatus' WHERE id='$id'");
    }

    header("Location: view_admins.php");
    exit();
}

// delete admin
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM users WHERE id='$id' AND role='admin'");
    header("Location: view_admins.php");
    exit();
}

$sql = "
SELECT u.id, u.name, u.email, u.is_active, u.created_at,
       c.name AS creator_name
FROM users u
LEFT JOIN users c ON u.created_by = c.id
WHERE u.role='admin'
ORDER BY u.id DESC
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Admins</title>
    <link rel="stylesheet" href="view_admins.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Main Admin Panel</div>
        <ul class="nav-links">
            <li><a href="main_admin_dashboard.php">Dashboard</a></li>
            <li><a href="create_admin.php">Create Admin</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Manage Admins</h1>
        <p>Enable, disable, review, and remove administrators from the complaint system.</p>
    </section>

    <section class="table-section">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['creator_name'] ?? 'Main Admin'; ?></td>
                <td><?php echo $row['created_at']; ?></td>

                <td>
                    <?php if ($row['is_active']) { ?>
                        <span class="active">Active</span>
                    <?php } else { ?>
                        <span class="inactive">Disabled</span>
                    <?php } ?>
                </td>

                <td>
                    <a class="action-btn" href="?toggle=<?php echo $row['id']; ?>">
                        <?php echo $row['is_active'] ? 'Disable' : 'Enable'; ?>
                    </a>

                    <a class="delete-btn" href="?delete=<?php echo $row['id']; ?>"
                       onclick="return confirm('Delete this admin?')">
                       Delete
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </section>

    <script src="view_admins.js"></script>
</body>
</html>