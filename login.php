<?php
session_start();
include("db.php");

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // ✅ USER REGISTER ONLY
    if ($action === 'register') {
        $name = trim($_POST['name']);
        $role = 'user';
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, role)
                VALUES ('$name', '$email', '$hashed', '$role')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful. Please login.";
        } else {
            $message = "Registration failed: " . mysqli_error($conn);
        }
    }

    // ✅ LOGIN FOR MAIN ADMIN + ADMIN + USER
    if ($action === 'login') {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];

                // ✅ role based redirect
                if ($user['role'] === 'main_admin') {
                    header("Location: admin/main_admin_dashboard.php");
                } elseif ($user['role'] === 'admin') {
                    header("Location: admin/admin_dashboard.php");
                } else {
                    header("Location: home.php");
                }
                exit();
            } else {
                $message = "Invalid password.";
            }
        } else {
            $message = "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<?php if (!empty($message)) echo "<p>$message</p>"; ?>

<form method="POST">
    <input type="hidden" name="action" value="login">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<hr>

<h2>User Registration</h2>
<form method="POST">
    <input type="hidden" name="action" value="register">
    <input type="text" name="name" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
</form>

</body>
</html>