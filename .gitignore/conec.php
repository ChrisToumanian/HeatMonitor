<?php

    error_reporting(0);
    ini_set('display_errors', 0);

    function Connection(){
    if (!($link=mysql_connect("minecraft.massivedamage.net:3306","Chris","Waunuma64")))  {
        exit();
    }
    if (!mysql_select_db("heatmonitor",$link)){
        exit();
    }
    return $link;
    }

?>