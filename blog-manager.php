<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <?php include 'navbar.php'; ?>
<?php
      require 'config.php';
      $conn = mysqli_connect($server,$user,$pass,$db_name);
      if(!$conn){
        die("Connection Error: " . mysqli_connect_error());
      }else{
      $sql = "select * from blog";
      $result = mysqli_query($conn,$sql);
      $blog =mysqli_fetch_assoc($result);
?>
          <div>
            <p>Blog Title: <?=$blog['title'];?></p>
            <p>Blog Author: <?=$blog['author'];?></p>
            <p>Created At: <?=$blog['created_at']?></p>
            <input type="submit" value="Delete Blog">
          </div>

<?php }?>
    <?php include 'footer.php'; ?>
</body>
</html>