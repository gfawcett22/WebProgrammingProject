<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    //gotta test if input values are in db
    //if (($inputUsername == in DB) && ($inputPassword == in DB)) {

        if (isset($_POST['rememberme'])) {
            /* Set cookie to last 1 year */
            setcookie('username', $_POST['username'], time()+60*60*24*365, '/account', 'www.example.com');
            setcookie('password', md5($_POST['password']), time()+60*60*24*365, '/account', 'www.example.com');

        } else {
            /* Cookie expires when browser closes */
            setcookie('username', $_POST['username'], false, '/account', 'www.example.com');
            setcookie('password', md5($_POST['password']), false, '/account', 'www.example.com');
        }
        header('Location: index.php');

   // } //else {
        //echo 'Username/Password Invalid';
    //}

} else {
    //redirect to login page
    header("Location: ./login.php");
    exit();
}
?>