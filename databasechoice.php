<?php
  session_start();
  if($_SESSION["validate"]!="true")
  {
    header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOAD SHEDDING - DATABASE INPUT</title>
<link rel="stylesheet" type="text/css" href="databasechoicecss.css"/>
<style>
   input{
   position:relative;
   left:33%;
   font-style:oblique;
   border-radius:5px;
   width:230px;
   margin:10px 15px 0 0;
   border:none;
   height:50px;
   background:linear-gradient(#5555dd,#1affff,#5555dd );
   font-size:1.2em;
   color:red;
   text-shadow:5px 5px 5px blue;
}

input:hover{
   position:relative;
   left:33%;
   font-style:oblique;
   border-radius:5px;
   width:230px;
   margin:10px 15px 0 0;
   border:none;
   height:50px;
   background:linear-gradient(#1affff,#5555dd,#1affff);
   font-size:1.2em;
   color:black;
   text-shadow:0 0 0 black;
}
h1{
   text-align:center;
}
</style>
</head>

<body id="bg">
  <div>
    <form name="databasechoice" action="databasechoicephp.php" method="post">          
	  <h1>কি করতে চান?</h1>
	  <br>
	  <input type="submit" name="লোডশেডিং_তথ্য_ইনপুট" value="লোডশেডিং_তথ্য_ইনপুট">
	  <br>
	  <input type="submit" name="বিস্তারিত_তথ্য_দেখুন" value="বিস্তারিত তথ্য দেখুন">
	  <br>
	  <input type="submit" name="লগইন_পেজে_ফিরে_যান" value="লগইন পেজে ফিরে যান">
	  <br>
	  <input type="submit" name="হোম_পেজে_ফিরে_যান" value="হোম পেজে ফিরে যান">
	</form>
  </div>    
</body>
</html>










