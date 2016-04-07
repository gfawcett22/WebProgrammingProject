<?php
include_once 'NewsCasterDatabase.php';
$userID = $_COOKIE['ID'];
$database = new NewsCasterDatabase();
$query = 'delete from `users` where ID =' . $userID . '; delete from `userProfileInfo` where userID = ' . $userID . ';';
var_dump($query);
exit;
$query = stripslashes($query);
$database->db_insert($query);
header('Location: ./logout.php');
?>