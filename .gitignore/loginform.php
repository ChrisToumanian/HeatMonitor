<!DOCTYPE html>
<html>
<head>
  <title>Item Shop</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="login.css">
  <link rel="shortcut icon" href="/images/favicon.ico" />
</head>

<body>

    <?php include 'navbar.php';?>

    <div class="login">
        <div class="contents">

            <form action="login.php" method="post" />
                <br>
                <div class="login-label">USERNAME</div>
                <input id="login-input" type="text" name="username" />
                <br><br>
                <div class="login-label">PASSWORD</div>
                <input type="text" name="password" />
                <br><br>
                <input type="submit" value="LOG IN" class="button" />
                <br><br>
            </form>

            <div class="login-signup"><a href="signupform.php">Sign Up</a></div>

            <br><br>

        </div>
    </div>

</body>

</html>