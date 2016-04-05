<?php
if (isset($_COOKIE['username']))
  unset($_COOKIE['username']);
if(isset($_COOKIE['password']))
  unset($_COOKIE['password']);
header('Location: login.php');
?>
