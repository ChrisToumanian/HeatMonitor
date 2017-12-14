<?php
	//include("conec.php");
	//$link = Connection();
	$resultDash = mysql_query("select * from data order by id desc",$link);
    $interiorTemp = 0;
    $exteriorTemp = 0;
    $rackTemp = 0;
	$humidity = 0;

    // Get Current
	while($row = mysql_fetch_array($resultDash)) {
		if ($row["location"] == "interior" && $interiorTemp == 0){
			$interiorTemp = $row["temperature"];
		}
        if ($row["location"] == "exterior" && $exteriorTemp == 0){
			$exteriorTemp = $row["temperature"];
		}
        if ($row["location"] == "rack" && $rackTemp == 0){
			$rackTemp = $row["temperature"];
		}
		if ($row["location"] == "interior" && $humidity == 0){
			$humidity = $row["humidity"];
		}
	}
	mysql_free_result($resultDash);

?>

<html>

<head>
  <title>HeatMonitor</title>
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>

	<div class="dashboard-container">

	<div class="dashboard-title">
		TRUCK A
	</div>
	
	</div>

	<div class="dashboard-bluebg">

	<div class="dashboard-smallcontainer">

<div class="dashboard-line"></div>

    <div class="dashboard-temp">
        <div class="dashboard-name">RACK</div>
        <?php echo($rackTemp); ?>°
    </div>

    <div class="dashboard-temp">
        <div class="dashboard-name">INTERIOR</div>
        <?php echo($interiorTemp); ?>°
    </div>

    <div class="dashboard-temp">
        <div class="dashboard-name">EXTERIOR</div>
        <?php echo($exteriorTemp); ?>°
    </div>

 <div class="dashboard-temp">
<div class="dashboard-name">HUMIDITY</div>
        <?php echo($humidity); ?>%
    </div>
	
	<div class="dashboard-line"></div>
	
	</div>
	
	</div>
	
</body>

</html>