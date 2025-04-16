<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <?php include 'navbar.php'; ?>
<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die("CONNECTION ERROR: " . mysqli_connect_error());
}else{
    $sql = "select firstName, lastName, email, reader_message from feedback";
    $result = mysqli_query($conn,$sql);
    $feedback = mysqli_fetch_all($result);
?>
<div class="contacts-table">
<table border="1">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Feedback Message</th>
    </thead>
    <?php for($i = 0; $i < count($feedback); $i++){ ?>
    <tbody style="text-align: center;">
            <td><?= $feedback[$i][0]; ?></td>
            <td><?= $feedback[$i][1];?></td>
            <td><?= $feedback[$i][2];?></td>
            <td><?= $feedback[$i][3];?></td>
    </tbody>
    <?php } ?>
</table>
</div>
<?php
    }
?>
    <?php include 'footer.php'; ?>
</body>
</html>