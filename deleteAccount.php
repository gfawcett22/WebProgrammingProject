<?php
require_once 'NewsCasterDatabase.php';
$userID = $_COOKIE['ID'];
$database = new NewsCasterDatabase();

$query = "delete from users where ID = '$userID'";
$profileInfoQuery = "delete from userProfileInfo where userID = '$userID'" ;

$profileInfoQuery = stripslashes($profileInfoQuery);
$blah = $database->db_insert($profileInfoQuery);
//var_dump($profileInfoQuery);
//var_dump($blah);
$query = stripslashes($query);
$temp = $database->db_insert($query);
var_dump($query);
var_dump($temp);
//exit;

header('Location: logout.php');
?>