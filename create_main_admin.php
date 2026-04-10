<?php
include("db.php");

$name = "Main Admin";
$email = "mainadmin@pplvoice.com";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$role = "main_admin";

$sql = "INSERT INTO users (name, email, password, role)
        VALUES ('$name', '$email', '$password', '$role')";

if (mysqli_query($conn, $sql)) {
    echo "Main admin created successfully";
} else {
    echo mysqli_error($conn);
}
?>