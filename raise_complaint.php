<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $category = $_POST['category'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $email = $_SESSION['user'];

    $uploadDir = "uploads/";

    // create folder automatically if missing
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageName = time() . "_" . basename($_FILES['image']['name']);
    $tmpName = $_FILES['image']['tmp_name'];
    $uploadPath = $uploadDir . $imageName;

    if (move_uploaded_file($tmpName, $uploadPath)) {
        $sql = "INSERT INTO complaints 
        (user_email, full_name, phone, category, subject, description, location, image)
        VALUES 
        ('$email','$name','$phone','$category','$subject','$description','$location','$uploadPath')";

        mysqli_query($conn, $sql);

        echo "<script>alert('Complaint submitted successfully');</script>";
    } else {
        echo "File upload failed.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="full_name" placeholder="Full Name" required><br><br>
    <input type="text" name="phone" placeholder="Phone" required><br><br>
    <input type="text" name="category" placeholder="Category" required><br><br>
    <input type="text" name="subject" placeholder="Subject" required><br><br>
    <textarea name="description" placeholder="Description" required></textarea><br><br>
    <input type="text" name="location" placeholder="Location" required><br><br>
    <input type="file" name="image" required><br><br>
    <button type="submit">Submit Complaint</button>
</form>