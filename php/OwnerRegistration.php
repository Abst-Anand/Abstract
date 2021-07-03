<?php

$name = $_POST['name'];
$owner_name = $_POST['owner_name'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$holding_capacity = $_POST['holding_capacity'];
$desired_amount = $_POST['desired_amount'];

//md5($password);
//echo "$email";
$conn = new mysqli('localhost','root','','parkinginfo');

if($conn->connect_error){
    die('connection failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into p_lots (name,owner_name,email,mobile_number,holding_capacity,desired_amount) values(?,?,?,?,?,?)");
    $stmt->bind_param("sssiii",$name,$owner_name,$email,$mobile_number,$holding_capacity,$desired_amount);
    $stmt->execute();
    echo "Data Collected!!! ";
    include "C:/xampp/htdocs/Abstract/OwnerInterface.html "; 
    $stmt->close();
    $conn->close();
}



?>