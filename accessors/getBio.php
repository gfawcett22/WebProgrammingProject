<?php 
	include_once 'NewsCasterDatabase.php';
	
	$userID = $_COOKIE['ID'];

	$database = new NewsCasterDatabase();	
	$query = 'select bio from `userProfileInfo` where userID =' . $userID;
	$result = $database->db_select($query);
	if(empty($result)){
		echo 'Edit your profile to add a bio.';
	}
	else{
		echo $result[0]['bio'];
	}
?>
