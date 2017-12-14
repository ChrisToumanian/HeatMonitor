<?php
	include("conec.php");
	$link=Connection();
	$result8=mysql_query("select * from data order by id desc",$link);
?>

<html>

<head>
  <title>HeatMonitor</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>

	<?php include 'navbar.php';?>

	<div class="container">

		<h1>Data Log</h1>
		
		<table border="2" cellspacing="1" cellpadding="1">
			<tr>
				<td>&nbsp;Location&nbsp;</td>
				<td>&nbsp;Time&nbsp;</td>
				<td>&nbsp;Temperature&nbsp;</td>
				<td>&nbsp;Humidity&nbsp;</td>
			</tr>
		<?php     
		while($row = mysql_fetch_array($result8)) {
		printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td></tr>", $row["location"], $row["time"],
		$row["temperature"], $row["humidity"]);
		}
		mysql_free_result($result8);
		?>
		</table>

	<div class="container">
	
</body>

</html>