<?php

    // Connect to database
    include("conec.php");
    $link = Connection();

    // Posts
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert posts into database table
    if ($username != NULL && $username != "") {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if (!mysql_query($sql)) {
            echo mysql_error();
            die('Error: ' . mysql_error());
        }

    }
    mysql_close();

    // Redirect
    $url = "Location: /heatmonitor/newuserlogin.php?username=" . $username . "&password=" . $password;
    header($url);
    exit();

?>