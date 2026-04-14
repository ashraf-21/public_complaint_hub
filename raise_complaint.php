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

<!DOCTYPE html>
<html>
<head>
    <title>Raise Complaint</title>
    <link rel="stylesheet" href="raise_complaint.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">User Portal</div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="raise_complaint.php">Raise Complaint</a></li>
            <li><a href="my_complaints.php">My Complaints</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Raise a Complaint</h1>
        <p>Submit your issue with all relevant details and upload supporting proof.</p>
    </section>

    <section class="form-section">
        <form method="POST" enctype="multipart/form-data" class="complaint-form">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="text" name="category" placeholder="Category" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="text" name="location" placeholder="Location" required>
            <input type="file" name="image" required>
            <button type="submit">Submit Complaint</button>
        </form>
    </section>

    <script src="raise_complaint.js"></script>
</body>
</html>