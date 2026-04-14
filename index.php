<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPL Voice - Home</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        min-height: 100vh;
        background: #f5f5f5;
        color: #222;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        padding: 20px 50px;
        background: #ffffff;
        border-bottom: 1px solid #ccc;
    }

    .nav-links {
        display: flex;
        gap: 20px;
        list-style: none;
    }

    .nav-links a {
        color: #333;
        text-decoration: none;
    }

    .hero {
        text-align: center;
        padding: 100px 20px;
    }

    .hero h1 {
        color: #222;
        margin-bottom: 10px;
    }

    .hero p {
        color: #555;
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 24px;
        background: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
    }
</style>
</head>
<body>
<nav class="navbar">
    <div>People Complaint Hub</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>
<section class="hero">
    <h1>Welcome to PPL Voice Complaint Portal</h1>
    <p>Raise complaints, track status, and communicate with admins.</p>
    <a class="btn" href="login.php">Login / Register</a>
</section>
</body>
</html>