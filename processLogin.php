<?php
require_once('NewsCasterDatabase.php');
$Database = new NewsCasterDatabase();

//Checks that user and pass are set in _POST
if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Initializing variables to contain _POST elements
	$inputUsername = $_POST['username'];
	$inputPassword = $_POST['password'];

	/*Select password where username matches in the database*/
	$UserQueryString = "SELECT Pass FROM users WHERE Username= '$inputUsername'";
	$IDQueryString = "SELECT ID FROM users WHERE Username= '$inputUsername'";

	//Stripping query strings of any slashes and querying the DB
	$tempUserQueryResult = stripslashes($UserQueryString);
	$tempIDQueryResult = stripslashes($IDQueryString);
	$passwordResult = $Database->db_select($tempUserQueryResult);
	$IDResult = $Database->db_select($tempIDQueryResult);

	if($inputPassword === $passwordResult[0]['Pass']){
		if (isset($_POST['rememberme'])) {
			/* Set cookie to last 1 year */
			setcookie('username', $_POST['username'], time()+60*60*24*365, '/', 'webdev.cs.kent.edu');
			setcookie('password', $_POST['password'], time()+60*60*24*365, '/', 'webdev.cs.kent.edu');
			setcookie('ID', $IDResult, time()+60*60*24*365, '/', 'webdev.cs.kent.edu');
			header('Location: ./index.php?username=' .$inputUsername);
		} else {
			/* Cookie expires when browser closes */
			setcookie('username', $_POST['username'], false, '/', 'webdev.cs.kent.edu');
			setcookie('password', $_POST['password'], false, '/', 'webdev.cs.kent.edu');
			setcookie('ID', $IDResult, false, '/', 'webdev.cs.kent.edu');
			header('Location: ./index.php?username=' .$inputUsername);
		}
	}else {
		header('Location: ./login.php?action=loginfailed');
	}
} else {
	header('Location: ./login.php?action=loginfailed');
}
?>
