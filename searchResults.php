<?php
   require 'config.php' ;
    $conn = mysqli_connect(hostname: $server,username: $user,password: $pass,database: $db_name);
    if($conn == false){
        print('Connection Error: ' . mysqli_connect_error());
    }else{
        if(isset($_POST['sidebar-submit'])){
            $search = htmlspecialchars(string: $_POST['search']);
            $query = "select title, author, content from blog where author = '$search';";
            $results = mysqli_query(mysql: $conn, query: $query);
            $blogs = mysqli_fetch_all(result: $results, mode: MYSQLI_ASSOC);
            if($blogs == true){
            for($i = 0; $i < count(value: $blogs); $i++){
            echo "<h3>" ."<i>BLOG TITLE: </i>" . $blogs[$i]['title'] . "</h3>";
            echo "<p>" . "<b>BLOG AUTHOR:  </b>" . $blogs[$i]['author'] . "</p>";
            echo "<article>". "<b>BLOG CONTENT: </b>" . $blogs[$i]['content'] . "</article>";
            }
            }else{
                echo "No Records Found" . "<br>";
        }
    }
} 
   mysqli_free_result(result: $results);
   mysqli_close(mysql: $conn);
?>