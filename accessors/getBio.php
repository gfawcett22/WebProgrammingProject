<?php 
	include_once 'NewsCasterDatabase.php';
	
	$userID = $_COOKIE['ID'];

	$database = new NewsCasterDatabase();	
	$query = 'select bio from `userProfileInfo` where userID =' . $userID;
	$result = $database->db_select($query);
	if(empty($result)){
		echo '<div class="col-md-7"><span class="profileInfo">Edit your profile to get a </span></div>';
	}
	else{
		echo '<div class="col-md-7"><span class="profileInfo">' . $result[0]['bio'] . '</span></div>';
	}
?>