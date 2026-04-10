<?php
session_start();
include("db.php");
$email = $_SESSION['user'];
$result = mysqli_query($conn, "SELECT * FROM complaints WHERE user_email='$email' ORDER BY id DESC");
?>
<h2>My Complaints</h2>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Subject</th>
    <th>Status</th>
    <th>Remark</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['status'] ?></td>
    <td><?= $row['admin_remark'] ?></td>
</tr>
<?php } ?>
</table>