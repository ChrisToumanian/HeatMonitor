<?php

  // Error Reporting
  //ini_set('display_errors',1); 
  //error_reporting(E_ALL);

  $highTemp = 0;
  $lowTemp = 200;
  $data = [];
  //$resolution = 30;
  //$chartHours = 24;
  $midnightEntry = $chartHours * 180;
  //$query = "temperature";

  // Collect Data
  //include("conec.php");
  //$link = Connection();
  //$result = mysql_query("select * from data order by id desc",$link);
  $i = 0;
  
  mysql_data_seek($result, 0);
  while($rs = mysql_fetch_array($result)) {

        // Add Data to Array
        $data[$i][0] = $rs["location"];
        $time = $rs["time"];
        $data[$i][1] = substr($time, 11, -3);
        $data[$i][2] = $rs[$query];
        $data[$i][3] = substr($time, 5, -8);

        // Get High & Low Temperatures
        if ($highTemp < $rs["temperature"]) {
            $highTemp = $rs["temperature"];
        }
        if ($lowTemp > $rs["temperature"]) {
            $lowTemp = $rs["temperature"];
        }

        $i++;
  }
  //mysql_free_result($result);

?>

<html>
  <head>
    <link rel="stylesheet" href="./chartist/chartist.css">
    <script src="./chartist/chartist.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chart.css">
    <style>
      .ct-perfect-fourth {
        height: 300px;
      }
      .ct-series-a .ct-area {
        fill: #BD2E35;
      }
      .ct-series-b .ct-area {
        fill: lightslategrey;
      }
      .ct-series-c .ct-area {
        fill: #1b9e77;
      }
      .legend#rack > .legend-color {
        background-color: #BD2E35;
      }
      .legend#interior > .legend-color {
        background-color: lightslategrey;
      }
      .legend#exterior > .legend-color {
        background-color: #1b9e77;
      }
    </style>
  </head>
  <body>

    <!-- Legend -->
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

    <div class="ct-chart ct-perfect-fourth" id="chart<?php $charts += 1; echo($charts); ?>"></div>

    <script>

      var data = {
        labels: [
          <?php
            if ($chartHours < 25) {
              for ($i = $midnightEntry; $i > 0; $i--) {
                if ($data[$i][0] == "rack") {
                  $minutes = substr($data[$i][1], 2);
                  $hour = substr($data[$i][1], 0, -3);
                  if ($minutes == "00" || $minutes == ":00") {
                    if ($hour > 0 && $hour < 13) {
                      $hour = "'" . $hour . "AM'";
                    } else if ($hour == 0) {
                      $hour = "'12AM'";
                    } else if ($hour == 13) {
                      $hour = "'1PM'";
                    } else if ($hour == 14) {
                      $hour = "'2PM'";
                    } else if ($hour == 15) {
                      $hour = "'3PM'";
                    } else if ($hour == 16) {
                      $hour = "'4PM'";
                    } else if ($hour == 17) {
                      $hour = "'5PM'";
                    } else if ($hour == 18) {
                      $hour = "'6PM'";
                    } else if ($hour == 19) {
                      $hour = "'7PM'";
                    } else if ($hour == 20) {
                      $hour = "'8PM'";
                    } else if ($hour == 21) {
                      $hour = "'9PM'";
                    } else if ($hour == 22) {
                      $hour = "'10PM'";
                    } else if ($hour == 23) {
                      $hour = "'11PM'";
                    }
                    echo($hour);
                  }
                  echo(",");
                }
              }
            } else {
              for ($i = $midnightEntry; $i > 0; $i--) {
                if ($data[$i][0] == "rack") {
                  if ($data[$i][1] == "0:00") {
                    echo("'" . $data[$i][3] . "'");
                  }
                  echo(",");
                }
              } 
            }
          ?>
        ],
        series: [
          [<?php
            $r = $resolution;
            for ($i = $midnightEntry; $i > 0; $i--) {
              if ($data[$i][0] == "rack") {
                if ($r == $resolution) {
                  echo($data[$i][2]);
                  $r = 0;
                }
                echo(",");
                $r++;
              }
            } 
          ?>],
          [<?php
            $r = $resolution;
            for ($i = $midnightEntry; $i > 0; $i--) {
              if ($data[$i][0] == "interior") {
                if ($r == $resolution) {
                  echo($data[$i][2]);
                  $r = 0;
                }
                echo(",");
                $r++;
              }
            } 
          ?>],
          [<?php
            $r = $resolution;
            for ($i = $midnightEntry; $i > 0; $i--) {
              if ($data[$i][0] == "exterior") {
                if ($r == $resolution) {
                  echo($data[$i][2]);
                  $r = 0;
                }
                echo(",");
                $r++;
              }
            } 
          ?>]
        ]
      };

      var options = {
        width: 960,
        height: 300,
        showPoint: false,
        showArea: true,
        //low: 0,
        //high: 0,
        axisY: {
          onlyInteger: true,
          scaleMinSpace: 15
        }
      };
      
      var chart = new Chartist.Line('#chart<?php echo($charts); ?>', data, options);

      /* chart.on('draw', function(data) {
      if(data.type === 'line' || data.type === 'area') {
        data.element.animate({
          d: {
            begin: 2000 * data.index,
            dur: 2000,
            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
            to: data.path.clone().stringify(),
            easing: Chartist.Svg.Easing.easeOutQuint
          }
        });
      }
      }); */

    </script>

  </body>
</html>