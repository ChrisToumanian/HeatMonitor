<?php
	
	error_reporting(0);
	ini_set('display_errors', 0);

	date_default_timezone_set('America/Los_Angeles');

	$timestamp = date('Y-m-d G:i:s');
	$temp = $_GET["temperature"];
	$humid = $_GET["humidity"];
	$location = $_GET["location"];

	include("conec.php");
	$link=Connection();
	$Sql="insert into data (location, time,temperature,humidity)  values ('$location', '$timestamp', '$temp', '$humid')";     
	mysql_query($Sql,$link);
	header("Location: insertreg.php");
	
?>