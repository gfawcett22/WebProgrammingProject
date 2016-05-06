<?php
require_once('NewsCasterDatabase.php');
$Database = new NewsCasterDatabase();
session_start();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
	//Initializing Variables to contain POST elements
	$inputUsername = $_POST['username'];
	$inputPassword = $_POST['password'];
	$inputEmail = $_POST['email'];
	$inputFirstName = $_POST['firstname'];
	$inputLastName = $_POST['lastname'];
	//get preference values when creating account
	if(isset($_POST['money'])){
		$money = 1;
	}else{
		$money=0;
	}

	if(isset($_POST['politics'])){
		$politics = 1;
	}else{
		$politics = 0;
	}
	if(isset($_POST['sports'])){
		$sports = 1;
	}else{
		$sports = 0;
	}
	if(isset($_POST['technology'])){
		$technology = 1;
	}else{
		$technology = 0;
	}

	//Storing info to insert back into text boxes if account creation fails
	$_SESSION['inputUsername'] = $inputUsername;
	$_SESSION['inputEmail'] = $inputEmail;
	$_SESSION['inputFirstName'] = $inputFirstName;
	$_SESSION['inputLastName'] = $inputLastName;

	//Set query Strings
	$emailQueryString = "SELECT Email FROM users where Email= '$inputEmail'";
	$UserQueryString = "SELECT Username FROM users WHERE Username= '$inputUsername'";
	$IDQueryString = "SELECT ID FROM users WHERE Username= '$inputUsername'";

	//Query DB for email and usernames
	$usernameStatus = $Database->db_select($UserQueryString);
	$emailStatus = $Database->db_select($emailQueryString);

	//var_dump($usernameStatus);
	//Checks if username and email are valid
	if($usernameStatus){
		$_SESSION['inputUsername'] = "";
		header('Location: ./CreateAccount.php?action=usernametaken');
	}else{
		if($emailStatus){
			$_SESSION['inputEmail'] = "";
			header('Location: ./CreateAccount.php?action=emailtaken');
		}else{
			$insertUserData = "INSERT INTO users (FirstName, LastName, Email, Username, Pass) VALUES('$inputFirstName','$inputLastName', '$inputEmail', '$inputUsername', '$inputPassword')";
			$temp = stripslashes($insertUserData);
			$usernameResult = $Database->db_query($temp);
			if(!($usernameResult)){
				header('Location: ./CreateAccount.php?action=error');
			}else{
				$IDResult = $Database->db_select($IDQueryString);
				$id = $IDResult[0]['ID'];
				$insertProfileInfo = "INSERT INTO userProfileInfo (userID, bio, location, profilePicPath, money, politics, sports, technology) VALUES ('$id', '', '', '', '$money', '$politics', '$sports', '$technology')";
				$temp = stripslashes($insertProfileInfo);
				//echo $temp;
				$returnProfileInsert = $Database->db_query($temp);
				/* Cookie expires when browser closes */
				setcookie('username', $_POST['username'], false, '/', 'webdev.cs.kent.edu');
				setcookie('password', $_POST['password'], false, '/', 'webdev.cs.kent.edu');
				setcookie('ID', $IDResult[0]['ID'], false, '/', 'webdev.cs.kent.edu');
				//setcookie('username', $_POST['username'], time()+60*60*24*365, '/', 'localhost');
				//setcookie('password', $_POST['password'], time()+60*60*24*365, '/', 'localhost');
				//setcookie('ID', $IDResult, time()+60*60*24*365, '/', 'localhost');
				header('Location: ./index.php?id='.$IDStatus[0]['ID']);
			}
		}
	}
}
?>

