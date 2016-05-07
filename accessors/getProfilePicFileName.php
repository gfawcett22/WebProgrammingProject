<?php
include_once 'NewsCasterDatabase.php';

$userID = $_COOKIE['ID'];

$database = new NewsCasterDatabase();
$query = 'select profilePicPath from `userProfileInfo` where userID =' . $userID;
$result = $database->db_select($query);

if (empty($result)) {
    echo "default.jpg";
} else {
    $path = $result[0]['profilePicPath'];
    //split array by /
    $temp = explode('/', $path);
    //echo last element in array i.e. the picture name and not full path
    echo end($temp);
}