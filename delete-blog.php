<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die("CONNECTION ERROR: " . mysqli_connect_error());
}else{
 
}