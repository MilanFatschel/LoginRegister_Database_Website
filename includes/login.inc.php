<?php

if(isset($_POST['loginbutton']))
{ 
	include_once 'dbh.inc.php';

	$username = $_POST['usernamelogin'];
	$password = $_POST['passwordlogin'];

	// Error handlers
	 // check for any empty fields
	if(empty($username) || empty($password))
	{
		header("Location: ../php/index.php?error=emptyfields");
	    exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE user_username=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../php/index.php?error=sqlerror");
	        exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result))
		    {
		    	$hashedpwdcheck = password_verify($password, $row['user_password']);
			    if($hashedpwdcheck == false)
				{
					header("Location: ../php/index.php?wrongpassword");
	                exit();
				}
				elseif($hashedpwdcheck == true)
				{
					// Log in the user
					session_start();
					$_SESSION['session_id'] = $row['user_id'];
					$_SESSION['session_email'] = $row['user_email'];
					$_SESSION['session_username'] = $row['user_username'];
					header("Location: ../php/home.php");
	                exit();
				}
				else
				{
					header("Location: ../php/index.php?wrongpassword");
	                exit();
				}
		    }
		    else
		    {
		    	header("Location: ../php/index.php?error=nousers");
	            exit();
		    }
		}
	}
}
else
{
	header("Location: ../php/index.php?login=error");
	exit();
}