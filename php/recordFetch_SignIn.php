<?php
  
    $email = $_POST['email'];  
    $password = $_POST['password'];
    //md5($password);
    //echo "$email";
    
    $conn = new mysqli('localhost','root','','signUP');

     if($conn->connect_error)
    {
          die('connection failed:'.$conn->connect_error);
    }
    else
    {
   

    $query= "SELECT * from users where email='$email' && password= '$password' ";

    $result = mysqli_query($conn,$query);
    $count  = mysqli_num_rows($result);

    if($count > 0)
    {
        
          
        echo "LogIn Success!";
        include "C:/xampp/htdocs/Abstract/UserInterface.php ";
        //open homepage
    }
    else
    {
        echo "F";
    }
  
   }



?>