<html>
<head>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <input id="btn" type="button" value="search for miami coordinates" />
	<?php
	$city = 'rajshahi';
 
#Find latitude and longitude
 
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$city";
$json_data = file_get_contents($url);
$result = json_decode($json_data, TRUE);
$latitude = $result['results'][0]['geometry']['location']['lat'];
$longitude = $result['results'][0]['geometry']['location']['lng'];
  echo $latitude;  
?>
</body>
</html>