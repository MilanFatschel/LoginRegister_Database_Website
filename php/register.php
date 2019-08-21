<!DOCTYPE html>
<html>
    <head>
        <title> Login Form Design </title>
        <link rel = "stylesheet" type = "text/css" href = "../css/registerstyle.css">
    </head>
<body>
    <div class = "loginbox">
    <img src = "../images/avatar.jpg" class = "avatar">
        <h1>Register</h1>
        <form class = "register-form" action = "../includes/register.inc.php" method = "POST">
             <p>Email</p>
            <input type = "text" name = "email" placeholder = "Enter Email">
            <p>Username</p>
            <input type = "text" name = "username" placeholder = "Enter Username">
            <p>Password</p>
            <input type = "password" name = "password" placeholder = "Enter Password" >
            <p>Verify Password</p>
            <input type = "password" name = "passwordrpt" placeholder = "Verify Password " >
            <input type = "submit" name = "registerbutton" value = "Register">
            <a href = "index.php">Back to login</a>
        </form>
    </div>
</body>
</html>