<?php
require_once('NewsCasterDatabase.php');
$Database = new NewsCasterDatabase();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    var_dump($inputUsername);
	/*Select password where username matches in the database*/
	$UserQueryString = "SELECT Pass FROM users WHERE Username= '$inputUsername'";
	$tempUserQueryResult = stripslashes($UserQueryString);
	$passwordResult = $Database->db_select($tempUserQueryResult);
    if($inputPassword === $passwordResult[0]['Pass']){
        if (isset($_POST['rememberme'])) {
            /* Set cookie to last 1 year */
            setcookie('username', $_POST['username'], time()+60*60*24*365, '/', 'webdev.cs.kent.edu');
            setcookie('password', $_POST['password'], time()+60*60*24*365, '/', 'webdev.cs.kent.edu');
        } else {
            /* Cookie expires when browser closes */
            setcookie('username', $_POST['username'], false, '/', 'webdev.cs.kent.edu');
            setcookie('password', $_POST['password'], false, '/', 'webdev.cs.kent.edu');
        }
        header('Location: index.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    header("Location: ./login.php");
    exit();
}
?>
