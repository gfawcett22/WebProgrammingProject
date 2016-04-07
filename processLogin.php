<?php
require_once('NewsCasterDatabase.php');
$Database = new NewsCasterDatabase();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
	//Initializing Variables to contain POST elements
	$inputUsername = $_POST['username'];
	$inputPassword = $_POST['password'];
	$inputEmail = $_POST['email'];
	$inputFirstName = $_POST['firstname'];
	$inputLastName = $_POST['lastname'];

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
		header('Location: ./CreateAccount.php?action=usernametaken');
	}else{
		if($emailStatus){
			header('Location: ./CreateAccount.php?action=emailtaken');
		}else{
			$insertUserData = "INSERT INTO users (FirstName, LastName, Email, Username, Pass) VALUES('$inputFirstName','$inputLastName', '$inputEmail', '$inputUsername', '$inputPassword')";
			$temp = stripslashes($insertUserData);
			$usernameResult = $Database->db_query($temp);
			if(!($usernameResult)){
				header('Location: ./CreateAccount.php?action=error');
			}else{
				$IDStatus = $Database->db_select($IDQueryString);
				/* Cookie expires when browser closes */
				setcookie('username', $_POST['username'], false, '/', 'webdev.cs.kent.edu');
				setcookie('password', $_POST['password'], false, '/', 'webdev.cs.kent.edu');
				setcookie('ID', $idStatus, false, '/', 'webdev.cs.kent.edu');
				//setcookie('username', $_POST['username'], time()+60*60*24*365, '/', 'localhost');
				//setcookie('password', $_POST['password'], time()+60*60*24*365, '/', 'localhost');
				//setcookie('ID', $IDResult, time()+60*60*24*365, '/', 'localhost');
				header('Location: ./index.php?id='.$IDStatus[0]['ID']);
			}
		}
	}
}
?>