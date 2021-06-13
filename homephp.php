<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "load_shedding_management";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$tb = "tb_".(int)date("d")."_".(int)date("m")."_".(int)date("Y");
//echo $tb."<br>";
$sql="select * from $tb";
$result = $conn->query($sql);
$tables = array();
$gmaparea=array();
$gmapcolor=array();
$gmaplat=array();
$gmaplng=array();
$gmapload_shedding_tooltip=array();			   

  while($row1=$result->fetch_array(MYSQLI_NUM))
  {
    array_push($tables,$row1[1]);
	array_push($gmaplat,(double)$row1[2]);
    array_push($gmaplng,(double)$row1[3]);
  }
$am_pm=0;
$server_hour=(int)date("h");
$server_minute=(int)date("i");

if(date("a")=="pm")$am_pm=12;  
  foreach($tables as $value)
  {
    //echo $value."<br>";
      $sql="SELECT * FROM $value";
	  $result = $conn->query($sql);
	  while($row=$result->fetch_assoc())
      {
       if($server_hour+$am_pm==$row["from_hour"] and $server_hour+$am_pm==$row["to_hour"])
	   {
	     if($server_minute>=$row["from_minute"] and $server_minute<=$row["to_minute"])
	     {
			array_push($gmaparea,$value);
			array_push($gmapload_shedding_tooltip,$row["load_shedding_tooltip"]);
			if($row['color']=="red")array_push($gmapcolor,"#ff0000");
			elseif($row['color']=="yellow")array_push($gmapcolor,"#ffff00");
            elseif($row['color']=="green")array_push($gmapcolor,"#00ff00");				
		  break;
	     } 
	   }
	   elseif($server_hour+$am_pm>$row["from_hour"] and $server_hour+$am_pm<$row["to_hour"])
	   {
		   array_push($gmaparea,$value);
		   array_push($gmapload_shedding_tooltip,$row["load_shedding_tooltip"]);
			if($row['color']=="red") array_push($gmapcolor,"#ff0000");
			elseif($row['color']=="yellow") array_push($gmapcolor,"#ffff00");
            elseif($row['color']=="green") array_push($gmapcolor,"#00ff00");				
		  break; 
	   }
      }
  } 
  $conn->close();
  //echo $gmaplng[0]."<br>";
?>
  
<!DOCTYPE html>
  <html>
    <script type='text/javascript'>
      function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 24.3636, lng: 88.6241},
          mapTypeId: 'terrain'
        });
        var gmapcolor=<?php echo json_encode($gmapcolor);?>;
        var gmaplat=<?php echo json_encode($gmaplat);?>;
        var gmaplng=<?php echo json_encode($gmaplng);?>;
        var gmapload_shedding_tooltip=<?php echo json_encode($gmapload_shedding_tooltip)?>;		
        var len=gmapcolor.length;
		
        for(var i = 0;i < len; i++) {
          var cityCircle = new google.maps.Circle({
            strokeColor: gmapcolor[i],
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: gmapcolor[i],
            fillOpacity: 0.35,
            map: map,
            center: {lat: gmaplat[i], lng: gmaplng[i]},
            radius: 200
          });
		  var marker = new google.maps.Marker({
            position: {lat: gmaplat[i], lng: gmaplng[i]},
            map: map,
            title: gmapload_shedding_tooltip[i]
          });
        }
      }
    </script>
 </html>
  	  