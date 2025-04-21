<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    echo 'connection error: ' . mysqli_connect_error();
}else{ 
?>
<div>
    <form action="user-verify.php" method="post">
    <input type="text" name="name" id="name" placeholder="name"><br><br>
    <input type="password" name="user_password" id="user_password" placeholder="password"><br><br>
    <input type="submit" name="verify-user" id="verify-user" placeholder="Login">
</form>
</div>
<?php 
         if(isset($_POST['verify-user'])){
            $name = htmlspecialchars($_POST['name']);
            $password = $_POST['user_password'];
            $sql = mysqli_query($conn, "select name,user_password from users");
            $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
            print_r($result);
            for($i=0;$i < count($result); $i++){
                    if  ($name == $result[$i]['name'] && $password == $result[$i]['user_password']){
                        header('Location: http://localhost/blog_website/admin.php');
                        die();
                    }
            }
         }
?>
<?php } ?>