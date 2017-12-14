<?php

    // Auto-Refresh (60 seconds)
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 60; URL=$url1");

	//include("conec.php");
	//$link = Connection();
	$result = mysql_query("select * from data order by id desc",$link);
	$result2 = mysql_query("select * from data order by id desc",$link);
	$result3 = mysql_query("select * from data order by id desc",$link);
	$result4 = mysql_query("select * from data order by id desc",$link);
	$result5 = mysql_query("select * from data order by id desc",$link);
	$highTemp = 0;
	$lowTemp = 0;
	$entries = 0;
	
	// Get Dates
	$dates = [];
	$i = 0;
	while($row = mysql_fetch_array($result5)) {
		$new = $row["time"];
		$dates[$i] = substr($new, 11, -3);
		$i++;
	}
	mysql_free_result($result5);

	// Get High Temp
	while($row = mysql_fetch_array($result4)) {
		if ($row["temperature"] > $highTemp){
			$highTemp = $row["temperature"];
		}
		if ($row["temperature"] < $lowTemp){
			$lowTemp = $row["temperature"];
		}
		$entries += 1;
	}
	mysql_free_result($result4);
	
?>

<html>

<head>
  <title>HeatMonitor</title>
  <link rel="stylesheet" href="chart.css">
</head>

<body>

    <div class="legend-wrapper clearfix">
        <div class="legend" id="rack">
            <div class="legend-color"></div>
            <div class="legend-name">RACK</div>
        </div>
        <div class="legend" id="interior">
            <div class="legend-color"></div>
            <div class="legend-name">INTERIOR</div>
        </div>
        <div class="legend" id="exterior">
            <div class="legend-color"></div>
            <div class="legend-name">EXTERIOR</div>
        </div>
    </div>

    </br>

    <svg viewBox="0 0 960 280" class="chart">

        <polyline class="chart-thickline" points="30,30 960,30"/>
        <polyline class="chart-dashedline" points="30,60 960,60"/>
        <polyline class="chart-dashedline" points="30,90 960,90"/>
        <polyline class="chart-dashedline" points="30,120 960,120"/>
        <polyline class="chart-dashedline" points="30,150 960,150"/>
        <polyline class="chart-dashedline" points="30,180 960,180"/>
        <polyline class="chart-dashedline" points="30,210 960,210"/>
        <polyline class="chart-line" points="30,240 960,240"/>

        <text x="0" y="33">120</text>
        <text x="0" y="63">110</text>
        <text x="0" y="93">100</text>
        <text x="0" y="123">90</text>
        <text x="0" y="153">80</text>
        <text x="0" y="183">70</text>
        <text x="0" y="213">60</text>
        <text x="0" y="243">50</text>

        <text x="65" y="255"><?php echo($dates[2700]); ?></text>
<polyline class="chart-dashedline" points="80, 30 80, 241"/>

        <text x="125" y="255"><?php echo($dates[2520]); ?></text>
<polyline class="chart-dashedline" points="140, 30 140, 241"/>

        <text x="185" y="255"><?php echo($dates[2340]); ?></text>
<polyline class="chart-dashedline" points="200, 30 200, 241"/>

        <text x="245" y="255"><?php echo($dates[2160]); ?></text>
<polyline class="chart-dashedline" points="260, 30 260, 241"/>

        <text x="305" y="255"><?php echo($dates[1980]); ?></text>
<polyline class="chart-dashedline" points="320, 30 320, 241"/>

        <text x="365" y="255"><?php echo($dates[1800]); ?></text>
<polyline class="chart-dashedline" points="380, 30 380, 241"/>

        <text x="425" y="255"><?php echo($dates[1620]); ?></text>
<polyline class="chart-dashedline" points="440, 30 440, 241"/>

        <text x="485" y="255"><?php echo($dates[1440]); ?></text>
<polyline class="chart-dashedline" points="500, 30 500, 241"/>

        <text x="545" y="255"><?php echo($dates[1260]); ?></text>
<polyline class="chart-dashedline" points="560, 30 560, 241"/>

        <text x="605" y="255"><?php echo($dates[1080]); ?></text>
<polyline class="chart-dashedline" points="620, 30 620, 241"/>

        <text x="665" y="255"><?php echo($dates[900]); ?></text>
<polyline class="chart-dashedline" points="680, 30 680, 241"/>

        <text x="725" y="255"><?php echo($dates[720]); ?></text>
<polyline class="chart-dashedline" points="740, 30 740, 241"/>

        <text x="785" y="255"><?php echo($dates[540]); ?></text>
<polyline class="chart-dashedline" points="800,30 800,241"/>

        <text x="845" y="255"><?php echo($dates[360]); ?></text>
<polyline class="chart-dashedline" points="860,30 860,241"/>

        <text x="905" y="255">
<?php echo($dates[180]); ?></text>
<polyline class="chart-dashedline" points="920,30 920,241"/>

        <polyline fill="none" stroke="#1b9e77" opacity="0.85" stroke-width="2" points="
            <?php     
                $i = 960;
                while($row = mysql_fetch_array($result)) {
                    if ($row["location"] == "exterior" && $i > 29) {
                        printf("%s,%s ", $i, -$row["temperature"] * 3 + 395);
                    }
                    /* if (strpos(substr($row["time"], 11, -3), '0:00') !== false) {
                        echo(
                            '<text x="' + $i + '" y="255">"' + substr($row["time"], 11, -3) + '"</text>' +
                            '<polyline class="chart-dashedline" points="' + $i + ',30 ' + $i + ',241"/>'
                        );
                    } */
                    $i -= 0.25;
                }
                mysql_free_result($result);
            ?>"
        />

        <polyline fill="none" stroke="lightslategrey" opacity="0.85" stroke-width="2" points="
            <?php     
                $i = 960;
                while($row = mysql_fetch_array($result2)) {
                    if ($row["location"] == "interior" && $i > 29) {
                        printf("%s,%s ", $i, -$row["temperature"] * 3 + 395);
                    }
                    $i -= 0.25;
                }
                mysql_free_result($result2);
            ?>"
        />

        <polyline fill="none" stroke="#E19191" opacity="0.85" stroke-width="2" points="
            <?php     
                $i = 960;
                while($row = mysql_fetch_array($result3)) {
                    if ($row["location"] == "rack" && $i > 29) {
                        printf("%s,%s ", $i, -$row["temperature"] * 3 + 395);
                    }
                    $i -= 0.25;
                }
                mysql_free_result($result3);
            ?>"
        />

    </svg>

</body>

</html>