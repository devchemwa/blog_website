<div class="new-post" id="new-post">
            <form  method="post">
                <input type="text" name="title" id="title" placeholder="Blog Title" required><br><br>
                <input type="text" name="author" id="author" placeholder="Author Name" required><br><br>
                <input type="text" name="content" id="content" placeholder="Blog Content" required><br><br>
                <input type="submit" value="Publish Blog">
            </form>
</div>
<?php
         require 'config.php';
         $conn = mysqli_connect($server,$user,$pass,$db_name);
         if(!$conn){
            die('Connection Error: ' . mysqli_connect_error());
         }
         if(isset($_POST['submit'])){
         $title = htmlspecialchars($_POST['title']);
         $author =htmlspecialchars($_POST['author']);
         $content = htmlspecialchars($_POST['content']);
         $sql =" insert into blog(title,author,content) VALUES('$title','$author','$content')";
         if($sql){
         mysqli_query($conn, $sql);
         $url = 'http://localhost/blog_website/post.php';
         header("Location: " . $url);
         die();
         }
        }         
mysqli_close($conn);