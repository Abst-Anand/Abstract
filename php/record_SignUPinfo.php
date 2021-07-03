<?php

$email = $_POST['email'];
$password = $_POST['password'];
md5($password);
//echo "$email";
$conn = new mysqli('localhost','root','','signUP');

if($conn->connect_error){
    die('connection failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into users (email,password) values(?,?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    echo "Registered Succesfully!!! Please Sign In";
    $stmt->close();
    $conn->close();
}



?>