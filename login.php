<?php

//Starts session
session_start();

if ($_GET["logout"]==1 AND $_SESSSION['id']) { session_destroy();

		$message = "You have been logged out. Have a nice day!";
	
		session_start();
	}

include("connection.php");

if ($_POST['submit']=="Sign Up") {
	
	//FORM VALIDATION
	
	//EMAIL VALIDATION
	
	if (!$_POST['email']) $error.= "<br />Please enter your email."; //Don't need {} if IF statement has only one line! This makes things more concise.
		else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error .= "Please enter a valid email.";
	
	
	if (!$_POST['password']) $error.= "<br />Please enter a password.";
		else {
			
			//Using strlen (string length) allows us to then see if the pass entered is less than eight characters
			if (strlen($_POST['password'])<8) $error.=	"<br />Please enter a password with at least eight characters.";
			
			//Using the regex below we can check if the password entered contains a capital letter.
			if (!preg_match('`[A-Z]`', $_POST['password']))	$error.= "<br />Please include at least one capital letter in your password.";
		}
	
	if ($error) $error = "There were error(s) in your signup details: ".$error;
	else {
		
		//Want to check if email is already IN database before adding it again.
		//So, first, we must connect to our database.
		$link = mysqli_connect("internal-db.s117290.gridserver.com", "db117290_nathan", "Friend234!", "db117290_example");
		
		//Problem: hackers can use database injection if we keep our DB reference like this
		// Including .mysqli_real_escape will escape any characters that could do damage to our DB 
		$query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
			
		$result = mysqli_query($link, $query);
		
		//Will store a number of rows in the DB or 0
		$results = mysqli_num_rows($result);
		
		if($results) $error =  "That email address is already registered. Do you want to log in?";
		else {
			
			//Add the email and password that user inputs into the DB, also hashes the password with the email to create more security.
			$query= "INSERT INTO `users` (`email`, `password`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
			
			mysqli_query($link, $query);
			
			echo "You've been signed up!";
			
			// Gets most recent user ID that signed up and starts a session with that user
			$_SESSION['id']=mysqli_insert_id($link);
			
			// Redirect to logged in page
			header("Location:mainpage.php");
			
		}
		
		}
		
		
	}
	
	if ($_POST['submit']=="Log In") {
		
		//Connect to DB
		$link = mysqli_connect("internal-db.s117290.gridserver.com", "db117290_nathan", "Friend234!", "db117290_example");
		
		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
		
		$result = mysqli_query($link, $query);
		
		$row = mysqli_fetch_array($result);
		
		if ($row) {
			
			$_SESSION['id']=$row['id'];
			
			// Redirect to logged in page
			header("Location:mainpage.php");
			
		} else {
			
			$error =  "We could not find a user with that email and password. Please try again.";
			
		}
		
	}
	
?>