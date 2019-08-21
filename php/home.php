<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Login Form Design </title>
        <link rel = "stylesheet" type = "text/css" href = "../css/homestyle.css">
    </head>
<body>
    <div class = "loginbox">
    <img src = "../images/avatar.jpg" class = "avatar">
        <form action = "../includes/login.inc.php">
          <h1>Welcome</h1>
          <h1>Your Account Info</h1>
          <p><?php echo "User ID: ", $_SESSION['session_username'];?></p>
          <p><?php echo "Email: ", $_SESSION['session_email'];?></p>
          <input type = "submit" name = "logoutbutton" value = "Logout">
        </form>
    </div>
</body>
</html>