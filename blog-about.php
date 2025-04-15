<?php
   require 'config.php' ;
    $conn = mysqli_connect(hostname: $server,username: $user,password: $pass,database: $db_name);
    if($conn == false){
        print('Connection Error: ' . mysqli_connect_error());
    }else{
            $query = "select title, author, created_at from blog;";
            $results = mysqli_query(mysql: $conn, query: $query);
            $blogs = mysqli_fetch_all(result: $results);
            if($blogs == true){
?>
<div class="blog-about-container">
<table border="1">
   <thead>
      <th>Blog Title</th>
      <th>Author</th>
      <th>Created At</th>
   </thead>
   <?php for($i = 0; $i < count(value: $blogs); $i++){  ?>
   <tbody>
         <td><?=$blogs[$i][0] ?></td>
         <td><?=$blogs[$i][1] ?></td>
         <td><?=$blogs[$i][2] ?></td>
         <td colspan="2"><button >Delete Blog</button>
         <button>Edit Blog</button></td>
   </tbody>
   <?php } ?>
</table>
</div>
<?php         } 
      }
   mysqli_free_result(result: $results);
   mysqli_close(mysql: $conn);
?>