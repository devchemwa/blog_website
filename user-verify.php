<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    echo 'connection error: ' . mysqli_connect_error();
}else{ 
?>
<div>
    <form action="user-verify.html.php">
    <input type="text" name="name" id="name" placeholder="name"><br><br>
    <input type="password" name="user_password" id="user_password" placeholder="password"><br><br>
    <input type="submit" name="verify-user" id="verify-user" placeholder="Login">
</form>
</div>
<?php 
         if(isset($_POST['verify-user'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $sql = mysqli_query($conn, "select name,user_password from users where name = '$name'");
            $result = mysqli_fetch_all($sql);
            print_r($result);
         }

?>

<?php } ?>