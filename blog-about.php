<?php
   require 'config.php' ;
    $conn = mysqli_connect(hostname: $server,username: $user,password: $pass,database: $db_name);
    if($conn == false){
        print('Connection Error: ' . mysqli_connect_error());
    }else{
            $query = "select title, author, created_at from blog where blogID > 0;";
            $results = mysqli_query(mysql: $conn, query: $query);
            $blogs = mysqli_fetch_all(result: $results, mode: MYSQLI_ASSOC);
            if($blogs == true){
            for($i = 0; $i < count(value: $blogs); $i++){ 
            echo 'BLOG TITLE: ' . $blogs[$i]['title'] . "<br><br>";
            echo 'BLOG AUTHOR: ' . $blogs[$i]['author'] . "<br><br>";
            echo  'CREATED AT: ' . $blogs[$i]['created_at'] . "<br><br>";
         } 
      } 
   }
   mysqli_free_result(result: $results);
   mysqli_close(mysql: $conn);
