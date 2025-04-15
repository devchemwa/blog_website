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
    <p><i><?=$blog[$i][1];?></i></p>
    <p style="text-wrap:wrap;"><?=$blog[$i][2];?></p>
    <p><i><?=$blog[$i][3];?></i></p>
    <?php } ?>
    </div>
</div>
<?php }?>