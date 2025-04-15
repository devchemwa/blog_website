<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('CONNECTION ERROR: '. mysqli_connect_error());
}else{
$sql = 'select title, author, content, created_at from blog';
$result = mysqli_query($conn,$sql);
$blog = mysqli_fetch_all($result);
?>
<div class="blog">
    <div class="blog-content">
     <?php for($i= 0;$i<count($blog);$i++){ ?>
     <br>
    <p><strong><?=$blog[$i][0];?></strong></p>
    <p><i><h5><?=$blog[$i][1];?></h5></i>  <i><h6><?=$blog[$i][3];?></h6></i></p>
    <p style="text-wrap:wrap;"><?=$blog[$i][2];?></p>
    <?php } ?>
    </div>
</div>
<?php }?>