<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>  
<?php
   require 'config.php' ;
    $conn = mysqli_connect(hostname: $server,username: $user,password: $pass,database: $db_name);
    if($conn == false){
        print('Connection Error: ' . mysqli_connect_error());
    }else{
            $query = "select title, author, created_at from blog;";
            $results = mysqli_query(mysql: $conn, query: $query);
            $blogs = mysqli_fetch_all(result: $results, mode: MYSQLI_ASSOC);
            if($blogs == true){
?>
<div class="blog-about-container">
<table border="1">
   <thead>
      <tr>
      <th>Blog Title</th>
      <th>Author</th>
      <th>Created At</th>
      </tr>
   </thead>
   <tbody>
   <?php for($i = 0; $i < count(value: $blogs); $i++){  ?>
      <tr>
         <td><?=$blogs[$i]['title'];?></td>
         <td><?=$blogs[$i]['author'];?></td>
         <td><?=$blogs[$i]['created_at'];?></td>
         </tr>
         <?php } 
            if(isset($_POST['delete_blog'])){
               $query = 'delete from ';
            } 
   ?>
   </tbody>
</table>
</div>
<?php         } 
      }
   mysqli_free_result(result: $results);
   mysqli_close(mysql: $conn);
?>
<?php include 'footer.php'; ?>
</body>
</html>