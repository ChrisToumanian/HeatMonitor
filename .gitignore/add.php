<?php

    // Insert Data to Database
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

    // Check if Data is higher than any notification
    $result = mysql_query("select * from users order by id desc",$link);
    while($rs = mysql_fetch_array($result)) {

        if ($location == "rack") {

            if ($temp > $rs["threshold"] && $rs["notifications"] == 1) {

                echo("temperature over threshold");

                require_once "Mail.php";

                $to = '<' . $rs["phone"] . '>';
                $subject = "Heat Monitor Notification";
                $body = "Pegasus A Truck's rack temperature is currently " . $temp . " degrees. Change settings at http://minecraft.massivedamage.net/heatmonitor";
                $from = '<cctoumanian@gmail.com>';
              
                $headers = array(
                    'From' => $from,
                    'To' => $to,
                    'Subject' => $subject
                );
              
                $smtp = Mail::factory('smtp', array(
                        'host' => 'ssl://smtp.gmail.com',
                        'port' => '465',
                        'auth' => true,
                        'username' => 'cctoumanian@gmail.com',
                        'password' => 'Waunuma64'
                    ));
              
                $mail = $smtp->send($to, $headers, $body);
              
                if (PEAR::isError($mail)) {
                    echo('<p>' . $mail->getMessage() . '</p>');
                } else {
                    echo('<p>Message successfully sent!</p>');
                }


            }
        }
	}

?>