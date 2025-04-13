<?php
require('config.php');
    $conn = mysqli_connect($server,$user,$pass,$db_name);
    if($conn == false){
        die("Connection Error: " .mysqli_connect_error());
    }else{
        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $query = mysqli_query($conn, "insert into feedback(firstName,lastName, email, reader_message) values('$fname','$lname','$email','$message')");
            if(!$query){
                echo "feedback not sent!!";
            }else{
                $url = 'http://localhost/blog_website/post.php';
                header(header: 'Location: ' . $url);
                die();
            }
        }
} ?> 