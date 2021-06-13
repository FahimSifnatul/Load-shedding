<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   // Create connection
   $conn = new mysqli($servername, $username, $password);
   $sql = "create database if not exists load_shedding_management";
   $conn->query($sql);
   $conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOAD SHEDDING</title>
    <link rel="stylesheet" type="text/css" href="homecss.css">
	<style>
	  .red{
	    margin-bottom:20px;
	  }
	  .green{
	    margin-bottom:40px;
	  }
	  #bg{
	    background-attachment:fixed;
	  }
    </style>	
  </head>
<body id="bg">
  <h1 id="head">LOAD SHEDDING</h1>
  <marquee scrolldelay="100" class="date_animation">
     <?php echo "Today is ".date("d-m-Y").". Find your location on map and see whether electricity is available or not right now.";?>
  </marquee>
  <div class="box red">
     <div class="white">LOAD SHEDDING</div>
  </div>
  <div class="box yellow">
     <div class="white">UPCOMING ELECTRICITY</div>
  </div>
  <div class="box green">
     <div class="white">ELECTRICITY IS AVAILABLE</div>
  </div>
  <script src="homejs.js"></script>
    <div id='map'></div>
    <?php include 'homephp.php';?>
	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAtwL3O2SmIJeHfxZITTSax0aJ6NKjeG0Q&callback=initMap'></script> 
</body>
</html>