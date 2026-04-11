<?php
session_start();
include('../db.php');

if ($_SESSION['role'] !== 'main_admin') {
    header('Location: ../login.php');
    exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $creator = $_SESSION['user_id'];

    mysqli_query($conn, "INSERT INTO users (name,email,password,role,created_by)
    VALUES ('$name','$email','$password','admin','$creator')");

    $message = "Admin created successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <link rel="stylesheet" href="create_admin.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Main Admin Panel</div>
        <ul class="nav-links">
            <li><a href="main_admin_dashboard.php">Dashboard</a></li>
            <li><a href="view_admins.php">Manage Admins</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Create New Admin</h1>
        <p>Grant administrator access to trusted staff members with secure credentials.</p>
    </section>

    <section class="form-section">
        <?php if (!empty($message)) { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>

        <form method="POST" class="admin-form">
            <input type="text" name="name" placeholder="Admin Name" required>
            <input type="email" name="email" placeholder="Admin Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Create Admin</button>
        </form>
    </section>

    <script src="create_admin.js"></script>
</body>
</html>