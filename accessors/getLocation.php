<?php 
	include_once 'NewsCasterDatabase.php';
	
	$userID = $_COOKIE['ID'];

	$database = new NewsCasterDatabase();	
	$query = 'select location from `userProfileInfo` where userID =' . $userID;
	$result = $database->db_select($query);
	if(empty($result)){
		echo 'Edit your profile to add a location';
	}
	else{
		echo $result[0]['location'];
	}
?>
