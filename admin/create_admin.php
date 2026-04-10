<?php
session_start();
include('../db.php');

if ($_SESSION['role'] !== 'main_admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $creator = $_SESSION['user_id'];

    mysqli_query($conn, "INSERT INTO users (name,email,password,role,created_by)
    VALUES ('$name','$email','$password','admin','$creator')");

    echo "Admin created successfully";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Admin Name" required><br><br>
    <input type="email" name="email" placeholder="Admin Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Create Admin</button>
</form>