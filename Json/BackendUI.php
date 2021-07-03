<?php

$server     = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'mapInput';

$connection = mysqli_connect($server,$username,$password,$database);


$location = mysqli_query($connection,"SELECT A.number , A.priority,A.description,A.category ,  B.location, B.building,b.latitude,b.longitude
FROM `incidents`AS A
INNER JOIN `coordinates` AS B
ON B.location = A.location ORDER BY A.location");
while($current = mysqli_fetch_assoc($location)){
$locations[] =$current;
}

echo json_encode( $locations ); // displays the data 
//json is like converter between php and JS 
?>