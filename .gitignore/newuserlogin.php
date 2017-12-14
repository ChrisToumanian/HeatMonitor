<?php

    // Posts
    $username = $_GET['username'];
    $password = $_GET['password'];

    // Check Username & Password
    include("conec.php");
    $link = Connection();

    $sql=mysql_query("SELECT id,username,password FROM users");

    if (mysql_num_rows($sql)) {
        while ($rs = mysql_fetch_array($sql)) {

            if ($rs['username'] == $username) {
                if ($rs['password'] == $password) {
                    
                    // Set Cookie
                    setcookie('username', $_POST['username'], time()+60*60*24*365, '/heatmonitor', 'minecraft.massivedamage.net');
                    setcookie('password', $_POST['password'], time()+60*60*24*365, '/heatmonitor', 'minecraft.massivedamage.net');
                    setcookie('id', $rs['id'], time()+60*60*24*365, '/heatmonitor', 'minecraft.massivedamage.net');

                    // Redirect
                    header("Location: /heatmonitor/settings.php");
                    exit();

                }
            }

        }
    }

    // Redirect
    header("Location: /heatmonitor/loginform.php");
    exit();

?>