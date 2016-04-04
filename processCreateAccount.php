<?php
require_once('NewsCasterDatabase.php');
$Database = new NewsCasterDatabase();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    $inputEmail = $_POST['email'];
    $inputFirstName = $_POST['firstname'];
    $inputLastName = $_POST['lastname'];
    $UserQueryString = "SELECT Username FROM users WHERE Username=" .$Database->db_quote($inputUsername);
    $result = $Database->db_quote($UserQueryString);
    $usernameStatus = $Database->db_select($result);
    if($usernameStatus === NULL){
        $insertUserData = "INSERT INTO users (FirstName, LastName, Email, Username, Pass) VALUES('$inputFirstName','$inputLastName', '$inputEmail', '$inputUsername', '$inputPassword')";
        $temp = stripslashes($insertUserData);
        $result = $Database->db_query($temp);
        if(!($result)){
            echo 'Failure to create User Account!';
        }else{
        /* Cookie expires when browser closes */
        setcookie('username', $_POST['username'], false, '/', 'webdev.cs.kent.edu');
        setcookie('password', $_POST['password'], false, '/', 'webdev.cs.kent.edu');
        header('Location: index.php');
        exit();
        }
    } else {
        echo 'Username/Password Invalid';
    }

} else {
    //redirect back to create account page
    header("Location: ./createAccount.php");
    exit();
}
?>
