<?php

     $email = $_POST['email'];
     $pswrd = $_POST['pswrd'];

     if(!empty($email) || !empty($pswrd))
      {
        

         $conn = new mysqli('localhost','root','');
         if(mysqli_connect_error() )
         {
             die('Connection Failed :'.$conn->connect_error);
             echo " Not Regitered";
         }
         else
         {
            $SELECT ="SELECT email from register Where email =? Limit 1";
            $INSERT ="INSERT Into register (email,pswrd) values(?,?)" ;
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
         }

            if($rnum==0)
            {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ss",$email, $pswrd);
                $stmt->execute();
                echo "REGISTRATION SUCCESSFULL";
            }
            else  
            {
                echo "ALREADY REGISTERED";
            }
            $stmt->close();
            $conn->close();
       }
      
     
     else
     {
         echo"All fields are required";
         die();
     }
    
     ?>  

     //hhh earlier
     <?php
$servername = "localhost";
$username = "root";
$password = "";
$database="test";

$email = filter_input(INPUT_POST, 'email');
$pswrd = filter_input(INPUT_POST, 'password');

$conn = new mysqli ($servername,$username,$password,$database);
$sql ="INSERT INTO `signup` (`email`, `password`) VALUES ('$email', '$password');"
mysqli_query($conn,$sql);


/*if (!$conn){
    die("Sorry, Not Connected:".mysqli_connect_error() );
}
else
{
    $sql ="INSERT INTO `signup` (`email`, `password`) VALUES ('$email', '$password');"
}
if ($conn->query($sql))
{
    echo "NEW RECORD INSERTED";
}
else
{
    echo "error:". $sql . "<br>" . $conn->error;
}







//creating database
//$sql ="CREATE DATABASE logincr
//mysqli_query($conn,$sql);

*/


?>

    