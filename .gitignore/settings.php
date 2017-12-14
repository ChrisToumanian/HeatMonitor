<?php

    // User Cookies
    if (isset($_COOKIE['id'])) {
    } else {
        header("Location: /heatmonitor/loginform.php");
        exit();
    }

    $username = "";
    $degrees = "";
    $email = "";
    $phone = "";
    $delay = "";
    $notifications = "";

    include("conec.php");
    $link=Connection();
    $result = mysql_query("select * from users order by id desc",$link);
    while($rs = mysql_fetch_array($result)) {
        if ($_COOKIE['id'] == $rs["id"]) {
            $username = $rs["username"];
            $degrees = $rs["threshold"];
            $email = $rs["email"];
            $phone = $rs["phone"];
            $delay = $rs["frequency"];
            $notifications = $rs["notifications"];
        }
    }

?>

<html>

<head>
    <title>HeatMonitor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="settings.css">
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <script>

        // Fill In Form
        function fillInForm() {
            document.getElementById('usernameinput').placeholder = "<?php echo($username) ?>";
            document.getElementById('thresholdinput').placeholder = "<?php echo($degrees) ?>";
            document.getElementById('emailinput').placeholder = "<?php echo($email) ?>";
            document.getElementById('phoneinput').placeholder = "<?php echo($phone) ?>";
            document.getElementById('frequencyinput').placeholder = "<?php echo($delay) ?>";
            document.getElementById('notificationslabel').innerHTML = "Send Alerts? (<?php echo($notifications) ?>)";
        }

        // Username
        function changeUsername() {
            username = document.getElementById('usernameinput').value;
            document.getElementById('usernameinput').value = "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            xmlhttp.open("GET", "updateprofile.php?username=" + username, true);
            xmlhttp.send();
        }

        // Password
        function changePassword() {
            password = document.getElementById('passwordinput').value;
            document.getElementById('passwordinput').value = "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            xmlhttp.open("GET", "updateprofile.php?password=" + password, true);
            xmlhttp.send();
        }

        // Threshold
        function changeThreshold() {
            threshold = document.getElementById('thresholdinput').value;
            document.getElementById('thresholdinput').value = "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            xmlhttp.open("GET", "updateprofile.php?threshold=" + threshold, true);
            xmlhttp.send();
        }

        // Email
        function changeEmail() {
            email = document.getElementById('emailinput').value;
            document.getElementById('emailinput').value = "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            xmlhttp.open("GET", "updateprofile.php?email=" + email, true);
            xmlhttp.send();
        }

        // Phone
        function changePhone() {
            phone = document.getElementById('phoneinput').value;

            //var e = document.getElementById("carrier");
            //var value = e.options[e.selectedIndex].value;
            //var text = e.options[e.selectedIndex].text;
            carrier = document.getElementById("carrier").value;
            phone = phone + carrier;


            document.getElementById('phoneinput').value = "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            xmlhttp.open("GET", "updateprofile.php?phone=" + phone, true);
            xmlhttp.send();
        }

        // Notifications
        function changeNotifications() {
            var checked = document.getElementById('notificationsinput').checked;
            //document.getElementById('notificationslabel').innerHTML = "Send Alerts? (updated)";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            if (checked) {
                xmlhttp.open("GET", "updateprofile.php?notifications=" + "1", true);
            } else {
                xmlhttp.open("GET", "updateprofile.php?notifications=" + "0", true);
            }
            xmlhttp.send();
        }

        // Frequency
        function changeFrequency() {
            frequency = document.getElementById('frequencyinput').value;
            document.getElementById('frequencyinput').value = "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            };
            xmlhttp.open("GET", "updateprofile.php?frequency=" + frequency, true);
            xmlhttp.send();
        }

    </script>
</head>

<body>

    <?php include 'navbar.php';?>

    <br>

    <div class="container">

    <h2>PROFILE SETTINGS</h2>

    Username<br>
    <form id="sendMessage" onsubmit="document.getElementById('usernamebutton').click(); return false;">
        <input class="input" autocomplete="off" id="usernameinput" type="textarea" name="message" value="" placeholder="Change Username..."><br><br>
        <input class="button button" id="usernamebutton" type="button" value="UPDATE" onclick="changeUsername();">
    </form>

    <br>

    Password<br>
    <form id="sendMessage" onsubmit="document.getElementById('passwordbutton').click(); return false;">
        <input class="input" autocomplete="off" id="passwordinput" type="textarea" name="message" value="" placeholder="Change Password..."><br><br>
        <input class="button button" id="passwordbutton" type="button" value="UPDATE" onclick="changePassword();">
    </form>

    <br>

    Degrees To Alert<br>
    <form id="sendMessage" onsubmit="document.getElementById('thresholdbutton').click(); return false;">
        <input class="input" autocomplete="off" id="thresholdinput" type="textarea" name="message" value="" placeholder="Degrees to alert..."><br><br>
        <input class="button button" id="thresholdbutton" type="button" value="UPDATE" onclick="changeThreshold();">
    </form>

    <br>

    Email Address<br>
    <form id="sendMessage" onsubmit="document.getElementById('emailbutton').click(); return false;">
        <input class="input" autocomplete="off" id="emailinput" type="textarea" name="message" value="" placeholder="Email to notify..."><br><br>
        <input class="button button" id="emailbutton" type="button" value="UPDATE" onclick="changeEmail();">
    </form>

    <br>

    Phone Number<br>
    <form id="sendMessage" onsubmit="document.getElementById('phonebutton').click(); return false;">
        <input class="input" autocomplete="off" id="phoneinput" type="textarea" name="message" value="" placeholder="Phone number to text..."><br><br>
        <input class="button button" id="phonebutton" type="button" value="UPDATE" onclick="changePhone();">
    </form>

    <br>

    Delay Between Updates (minutes)<br>
    <form id="sendMessage" onsubmit="document.getElementById('frequencybutton').click(); return false;">
        <input class="input" autocomplete="off" id="frequencyinput" type="textarea" name="message" value="" placeholder="Delay between notifications (minutes)"><br><br>
        <input class="button button" id="frequencybutton" type="button" value="UPDATE" onclick="changeFrequency();">
    </form>

    <br>

    <form id="sendMessage">
        <input type="checkbox" class="checkbox" id="notificationsinput" name="subscribe" value="newsletter">
        <label for="notificationsinput" id="notificationslabel">Send Alerts?</label>
        <input class="button button" id="notificationsbutton" type="button" value="UPDATE" onclick="changeNotifications();">
    </form>

    <br>

    <select name="carrier" id="carrier">
        <option value="@txt.att.net">AT&T</option>
        <option value="@vtext.com">Verizon</option>
    </select>

    <br>

    <div class="settings-logout">
        <a title="Log Out" href="logout.php"><input class="button button" id="logoutbutton" type="button" value="LOG OUT" onclick="logout();"></a>
    </div>

    </div>

    <script>fillInForm();</script>

</body>

</html>