<?php

//echo "$email";
$conn = new mysqli('localhost','root','','parkinginfo');


$selectquery = "SELECT * from p_lots ";

$query = mysqli_query($conn,$selectquery);

$nums = mysqli_num_rows($query);

$res = mysqli_fetch_array($query);

while($res = mysqli_fetch_array($query) )
  {
      echo $res['name'] . "<br>";
      echo $res['owner_name'] . "<br>";
      echo $res['desired_amount'] . "<br>";
  }


?>