<?php
  require_once 'NewsCasterDatabase.php';
  
  $database = new NewsCasterDatabase();
  //test if user has profile
  $userID = $COOKIE['ID'];
  $query = "Select bio, location, profilePicPath from `userProfileInfo` where userID = " . $userID;
  $profileExists = $database->db_select($query);
  if ($profileExists != null){
    $query = 'insert into `userProfileInfo` (bio, location, profilePicPath) values('. $_POST['bio'] . ',' .  $_POST['location'] .
    ',' . 
  }


  function saveFile($file){
    $directory = './pictures/';
    $file = $directory . .basename($_FILES['profilePic']['name']);
  }
?>
