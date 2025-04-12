<?php
   require 'config.php';
   $conn = mysqli_connect($server,$user,$pass,$db_name);
   if($conn == false){
      echo "Connection Error: " . mysqli_connect_error();
   }
   ?>
   <div class="blog-info">
   <ul>
   <?php if(isset($_POST["about-search"])){ ?>
   <?php $search = $_POST['search'];
   $sql = "select * from blog";
   $results = mysqli_query($conn,$sql);
   $blog = mysqli_fetch_assoc($results); ?>
      <p><span>Blog ID:</span><?= $blog['blogID']; ?></p>
      <p><span>Title:</span> <?=$blog['title']; ?></p>
      <p><span>Author:</span> <?= $blog['author']; ?></p>
      <p><span>Content:</span><?= $blog['content'] ?></p>
      <p><span>Created At:</span><?= $blog['created_at']; ?></p>
   </ul>
   </div>
 <?php } ?>