<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    echo 'connection error: ' . mysqli_connect_error();
}else{
        $sql = mysqli_query($conn, 'select * from blog');
        $blog = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>
<form action="edit_blog.html.php" method="post">
    <?php for($i = 0; $i < count($blog); $i++){ ?>
    <p><input type="number" name="blogID" id="blogID" value="<?=$blog[$i]['blogID'];?>"></p>
    <p><input type="text" name="title" id="title" value="<?=$blog[$i]['title'];?>"></p>
    <p><input type="text" name="author" id="author" name="author" value="<?=$blog[$i]['author'];?>"></p>
    <textarea name="content" id="content"><?=$blog[$i]['content'];?></textarea>
    <p><input type="submit" value="Save Changes" name="save-changes"></p>
    <p></p>
    <?php } } ?>
</form>
<?php
if(isset($_POST['save-changes'])){
    $id = $_POST['blogID'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
$query = "update blog set title = '$title',author = '$author', content = '$content' where blogID = '$id'";
if(!$query){
    echo 'Error in sql statement: ' . $sql;
}else{
    $url = 'http://localhost/blog_website/post.php';
    header('Location: ');
    die();
}
}
?>