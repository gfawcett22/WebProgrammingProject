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
	$emailQueryString = "SELECT Email FROM users where Email=" .$Database->db_quote($inputEmail);
	$UserQueryString = "SELECT Username FROM users WHERE Username=" .$Database->db_quote($inputUsername);
	$IDQueryString = "SELECT ID FROM users WHERE Username=" .$Database->db_quote($inputUsername);

	//Query DB for email and usernames
	$usernameResult = $Database->db_quote($UserQueryString);
	$usernameStatus = $Database->db_select($usernameResult);
	
	$emailResult = $Database->db_quote($emailQueryString);
	$emailStatus = $Database->db_select($emailQueryString);
	
	$idResult = $Database->db_quote($IDQueryString);
	$idStatus = $Database->db_select($IDqueryString);

	//Checks if username and email are valid
	if($usernameStatus !== NULL){
		header('Location: ./CreateAccount.php?action=usernametaken');
	}else{
		if($emailStatus !== NULL){
			header('Location: ./CreateAccount.php?action=emailtaken');
		}else{
			$insertUserData = "INSERT INTO users (FirstName, LastName, Email, Username, Pass) VALUES('$inputFirstName','$inputLastName', '$inputEmail', '$inputUsername', '$inputPassword')";
			$temp = stripslashes($insertUserData);
			$usernameResult = $Database->db_query($temp);
			if(!($usernameResult)){
				header('Location: ./CreateAccount.php?action=error');
			}else{
				/* Cookie expires when browser closes */
				setcookie('username', $_POST['username'], false, '/', 'webdev.cs.kent.edu');
				setcookie('password', $_POST['password'], false, '/', 'webdev.cs.kent.edu');
				setcookie('ID', $idStatus, false, '/', 'webdev.cs.kent.edu');
				header('Location: index.php');
			}
		}
	}
}
?>
