<?php

    $id = $_COOKIE['id'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $threshold = $_GET['threshold'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $notifications = $_GET['notifications'];
    $frequency = $_GET['frequency'];
    
    // Connect to database
    include("conec.php");
    $link = Connection();

    // Modify Profile Info
    if ($username !== NULL && $username !== "") {
        $sql = mysql_query("UPDATE users SET username='$username' WHERE id='$id'");
    }
    if ($password !== NULL && $password !== "") {
        $sql = mysql_query("UPDATE users SET password='$password' WHERE id='$id'");
    }
    if ($threshold !== NULL && $threshold !== "") {
        $sql = mysql_query("UPDATE users SET threshold='$threshold' WHERE id='$id'");
    }
    if ($email !== NULL && $email !== "") {
        $sql = mysql_query("UPDATE users SET email='$email' WHERE id='$id'");
    }
    if ($phone !== NULL && $phone !== "") {
        $sql = mysql_query("UPDATE users SET phone='$phone' WHERE id='$id'");
    }
    if ($notifications !== NULL && $notifications !== "") {
        $sql = mysql_query("UPDATE users SET notifications='$notifications' WHERE id='$id'");
    }
    if ($frequency !== NULL && $frequency !== "") {
        $sql = mysql_query("UPDATE users SET frequency='$frequency' WHERE id='$id'");
    }
    mysql_close();

?>