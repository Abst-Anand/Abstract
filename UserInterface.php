<html>

<head>
  <title>UserInterface</title>
  <link rel="stylesheet" href="css/UserInterface.css">
  <div class="side-menu">

    <h1 class="head">Park</h1>
    <img src="Images/download (1).jpg" class="img"><br><br>

    <div class="col">
      <li><a href="#"> Profile </a></li>
      <li><a href="#"> Previous Bookings </a></li>
      <li><a href="#"> Payment Methods </a></li>
      <li><a href="#"> Contact Us </a></li>
      <li><a href="#"> Follow Us </a></li>
      <li><a href="#"> Help </a></li>
    </div>

    <div class="center">
      <div class="text">Click the button to get your coordinates.</p>
        <button class="loc-btn" onclick="getLocation()">Share Your Location</button>
        <p id="location"></p>
      </div>
    </div>
  </div>

</head>

<body>

  <div class="table-box">
    <h1 style="text-align: center;">Parking Lots:</h1><br>
    <div class="table-row">
      <div class="table-cell">
        <p>Parking Lot Name</p>
      </div>
      <div class="table-cell">
        <p>Owner Name</p>
      </div>
      <div class="table-cell">
        <p>Amount</p>
      </div>
      <div class="table-cell">
        <p>Operation</p>
      </div>
    </div>
  </div>
     
  <div>
    <?php

//echo "$email";
$conn = new mysqli('localhost','root','','parkinginfo');


$selectquery = "SELECT * from p_lots ";

$query = mysqli_query($conn,$selectquery);

$nums = mysqli_num_rows($query);

$res = mysqli_fetch_array($query);

while($res = mysqli_fetch_array($query) )
  {
    ?>
    <div class="table-row">
      <div class="table-cell">
        <p> <?php echo $res['name']; ?> </p>
      </div>
      <div class="table-cell">
        <p> <?php echo $res['owner_name'];?> </p>
      </div>
      <div class="table-cell">
        <p> <?php echo $res['desired_amount'];?> </p>
      </div>
      <div class="table-cell">
        <p><a href="Transaction.html">Book Now</a></p>
      </div>
    </div>
    <?php
      }
    ?>

   
  </div>
       
      

    


  <script>
    var x = document.getElementById("location");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          x.innerHTML = "User denied the request for Geolocation."
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML = "Location information is unavailable."
          break;
        case error.TIMEOUT:
          x.innerHTML = "The request to get user location timed out."
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML = "An unknown error occurred."
          break;
      }
      //document.getElementById("location").innerHTML = "Latitude";
      //document.getElementById("location").innerHTML = "Longitude";
      //document.getElementById("location").innerHTML = x.innerHTML;
      
    }
  </script>
</body>
</div>

</html>