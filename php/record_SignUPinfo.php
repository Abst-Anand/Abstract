<?php

$email = $_POST['email'];
$password = $_POST['password'];
md5($password);
//echo "$email";
$con = new mysqli('localhost','root','','signUP');

if($con->connect_error){
    die('connection failed:'.$con->connect_error);
}else{
    $stmt = $con->prepare("insert into users (email,password) values(?,?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
   // echo "Registered Succesfully!!! Please Sign In";
    //header ("Location: https://localhost/Abstract/UserInterface.php", true, 301 );
    header('C:/xampp/htdocs/Abstract/EMAILOTP/Login and Signup Form with Email Verification - PHP/controllerUserData.php');
    $stmt->close();
    $con->close();
}



?>