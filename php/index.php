<!DOCTYPE html>
<html>
    <head>
        <title> Login Form Design </title>
            <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
    </head>
<body>
    <div class = "loginbox">
    <img src = "../images/avatar.jpg" class = "avatar">
        <h1>Login</h1>
        <form action = "../includes/login.inc.php" method = "POST">
            <p>Username</p>
            <input type = "text" name = "usernamelogin" placeholder = "Enter Username">
            <p>Password</p>
            <input type = "password" name = "passwordlogin" placeholder = "Enter Password" >
            <input type = "submit" name = "loginbutton" value = "Login">
            <a href = "#">Forgot Your Password?</a><br>
            <a href = "../php/register.php">Sign Up</a>
        </form>
    </div>
</body>
</html>