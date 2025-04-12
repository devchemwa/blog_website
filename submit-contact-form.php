<?php
require('config.php');
    $conn = mysqli_connect($server,$user,$pass,$db_name);
    if($conn == false){
        die("Connection Error: " .mysqli_connect_error());
    }else{
        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $message = $_POST['message'];
            $query = mysqli_query($conn, "insert into feedback(firstName,lastName,reader_message) values('$fname','$lname','$message')");
            if($query){
                echo "feedback sent successfully";
            }else{
                echo "feedback not sent!!";
            }
        }
    }
    ?>