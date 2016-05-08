<?php
session_start();
$_SESSION = array();
session_destroy();
if (isset($_COOKIE['username']))
  setcookie('username','',time()-3600,'/','webdev.cs.kent.edu');
  setcookie('username','',time()-3600,'/','localhost');
if(isset($_COOKIE['password']))
  setcookie('password','',time()-3600,'/','webdev.cs.kent.edu');
  setcookie('password','',time()-3600,'/','localhost');
if(isset($_COOKIE['ID']))
  setcookie('ID','',time()-3600,'/','webdev.cs.kent.edu');
  setcookie('ID','',time()-3600,'/','localhost');

header('Location: login.php');
?>
