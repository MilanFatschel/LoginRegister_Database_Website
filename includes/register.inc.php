<?php

if(isset($_POST['registerbutton']))
{
	include_once 'dbh.inc.php';

	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordrpt = $_POST['passwordrpt'];

    // check for any empty fields
	if(empty($email) || empty($username) || empty($password) || empty(passwordrpt))
	{
		header("Location: ../php/register.php?signup=emptyfields&email=".$email."&username=".$username);
	    exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../php/register.php?signup=invalidmailusername=");
	    exit();
	} 
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../php/register.php?signup=invalidmail&username=".$username);
	    exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../php/register.php?signup=invalidusername&email=".$email);
	    exit();
	}
	else if($password !== $passwordrpt)
	{
		header("Location: ../php/register.php?signup=passwordcheck&email=".$email."&username=".$username);
	    exit();
	}
	else
	{
		$sql = "SELECT user_username FROM users WHERE user_username=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../php/register.php?signup=sqlerror");
	        exit();
		}
		else 
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0)
			{
				header("Location: ../php/register.php?signup=usertaken&email = ".$email);
				   exit();
			}
			else 
			{
				// insert user into the data base
				$sql = "INSERT INTO users (user_email, user_username, user_password)
				        VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		        if(!mysqli_stmt_prepare($stmt, $sql))
		        {
			        header("Location: ../php/register.php?signup=sqlerror");
	                exit();
		        }
		        else
		        {
		        	// Hash the password
				    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
		        	mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedpassword);
		        	mysqli_stmt_execute($stmt);
		        	mysqli_stmt_store_result($stmt);
				    header("Location: ../php/register.php?signup=success");
				    exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysql_close($conn);
}
else
{
    header("Location: ../register.php");
	exit();	
}
