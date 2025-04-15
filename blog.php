<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('CONNECTION ERROR: ' . mysqli_connect_error());
}else{
    $sql = 'select title, author, content from blog';
    $result = mysqli_query($conn,$sql);
    $blog = mysqli_fetch_all($result);
    ?>
    <div class="blog">
        <div class="blog-content">
         <?php for($i= 0;$i<count($blog);$i++){ ?>
         <br>
        <p><strong><a href="post.php"><?=$blog[$i][0];?></a></strong></p>
        <p><i><h5><?=$blog[$i][1];?></h5></i></p>
        <p style="text-wrap:wrap;"><?=$blog[$i][2];?></p>
        <?php } ?>
        </div>
    </div>
<?php } 
mysqli_close($conn);
mysqli_free_result($result);
?>
