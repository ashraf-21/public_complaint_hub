<?php
include '../db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    mysqli_query($conn, "UPDATE complaints SET status='$status', admin_remark='$remark' WHERE id='$id'");
    header('Location: view_complaints.php');
}
?>
<form method="POST">
    <select name="status">
        <option>Pending</option>
        <option>In Progress</option>
        <option>Resolved</option>
        <option>Rejected</option>
    </select><br><br>
    <textarea name="remark" placeholder="Admin remark"></textarea><br><br>
    <button type="submit">Update</button>
</form>