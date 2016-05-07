<?php
require_once ("NewsCasterDatabase.php");
$userID = $_COOKIE['ID'];
$database = new NewsCasterDatabase();
$query = 'select money, politics, sports, technology from `userProfileInfo` where userID =' . $userID;
$result = $database->db_select($query);
$result = json_encode($result);
echo $result;

?>

