
<?php

  // Auto-Refresh (60 seconds)
  $url=$_SERVER['REQUEST_URI'];
  header("Refresh: 60; URL=$url");

  include("conec.php");
  $link = Connection();
  $result = mysql_query("select * from data order by id desc",$link);
  $charts = 0;
?>

<html>

<head>
  <title>HeatMonitor</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="./images/favicon.ico" />
</head>

<body>

  <?php include 'navbar.php';?>

  <?php include 'dashboard.php';?>

  <div class="container">
    
    </br>

    <h2>LAST 6 HOURS</h2>
    <?php $resolution = 1; $chartHours = 6; $query = "temperature"; include 'chartist.php';?>

    <h2>LAST 24 HOURS</h2>
    <?php $resolution = 4; $chartHours = 24; $query = "temperature"; include 'chartist.php';?>

    <h2>LAST 7 DAYS</h2>
    <?php $resolution = 15; $chartHours = 168; $query = "temperature"; include 'chartist.php';?>

    <h2>HUMIDITY LAST 7 DAYS</h2>
    <?php $resolution = 20; $midnightEntry = 30240; $query = "humidity"; include 'chartist.php';?>

    </br>

  </div>
	
</body>

</html>