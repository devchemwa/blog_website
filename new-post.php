<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<body>
   <?php include 'navbar.php'; ?>
   <div class="new-post-container">
      <div class="new-post" id="new-post">
         <form action="new-post.php" method="post">
            <input type="text" name="title" id="title" placeholder="Blog Title" required><br><br>
            <input type="text" name="author" id="author" placeholder="Author Name" required><br><br>
            <label for="Blog Content">Blog Content: </label><br><br>
            <textarea name="content" id="blog_text_area" rows="20" cols="66">

            </textarea><br><br>
            <input type="submit" name="post-submit" id="post-submit" value="Publish Blog">
         </form>
      </div>
   </div>
   </div>

   <?php include 'footer.php'; ?>
</body>

</html>

<?php
require 'config.php';
$conn = mysqli_connect($server, $user, $pass, $db_name);
if (!$conn) {
   die('Connection Error: ' . mysqli_connect_error());
}
if (isset($_POST['post-submit'])) {
   $title = htmlspecialchars($_POST['title']);
   $author = htmlspecialchars($_POST['author']);
   $content = htmlspecialchars($_POST['content']);
   $date = date('Y/m/d');
   $sql = " insert into blog(title,author,content,created_at) VALUES('$title','$author','$content','$date')";
   mysqli_query($conn, $sql);
   if (!$sql) {
      die("sql error: " . $sql);
   } else {
      $url = 'http://localhost/blog_website/post.php';
      header("Location: " . $url);
      die();
   }
}
mysqli_close($conn);