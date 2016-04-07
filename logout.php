<?php
if (isset($_COOKIE['username']))
  setcookie('username','',time()-3600,'/','webdev.cs.kent.edu');
if(isset($_COOKIE['password']))
  setcookie('password','',time()-3600,'/','webdev.cs.kent.edu');
if(isset($_COOKIE['ID']))
  setcookie('ID','',time()-3600,'/','webdev.cs.kent.edu');
header('Location: login.php?action=deleted');
?>
