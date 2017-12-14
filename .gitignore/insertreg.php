<html>

<head>
  <title>HeatMonitor</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>

	<h1>Data from the temperature and humidity sensors</h1>
	<form action="add.php" method="get">
	<TABLE>
	<tr>
	   <td>Temperature</td>
	   <td><input type="text" name="temperature" size="20" maxlength="30"></td>
	</tr>
	<tr>
	   <td>Humidity</td>
	   <td><input type="text" name="humidity" size="20" maxlength="30"></td>
	</tr>
	</TABLE>
	<input type="submit" name="accion" value="Submit">
	</FORM>
	<hr>

	<?php
	   include("conec.php");
	   $link=Connection();
	   $result=mysql_query("select * from data order by id desc",$link);
	?>
	<table border="1" cellspacing="1" cellpadding="1">
		  <tr>
			 <td>&nbsp;Temperature&nbsp;</td>
			 <td>&nbsp;Moisture&nbsp;</td>
		   </tr>
	<?php     
	   while($row = mysql_fetch_array($result)) {
	printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td></tr>", $row["temperature"], $row["humidity"]);
	   }
	   mysql_free_result($result);
	?>
	</table>
	
</body>

</html>