<?php

    // Set Cookie
    setcookie('username', '', time()+60*60*24*365, '/heatmonitor', 'minecraft.massivedamage.net');
    setcookie('password', '', time()+60*60*24*365, '/heatmonitor', 'minecraft.massivedamage.net');
    setcookie('id', '', time()+60*60*24*365, '/heatmonitor', 'minecraft.massivedamage.net');

    // Redirect
    header("Location: /heatmonitor/index.php");
    exit();

?>