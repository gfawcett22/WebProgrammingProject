<?php
  include_once 'NewsCasterDatabase.php';  
  $fileToMove = $_FILES['picUpload']['tmp_name'];  
  $destination = './pictures/' . $_FILES['picUpload']['name'];
  $imageFileType = pathinfo($destination , PATHINFO_EXTENSION);   
    //echo $fileToMove . ' ' . $destination . '<br>';    
  if(move_uploaded_file($fileToMove, $destination)){
    //do nothing
  }else{
    header('Location: ./viewProfile.php?action=filefailed');
    exit();    
  }

  //test if user entered bio and location  
  if (isset($_POST['bio'])){
    $bio = $_POST['bio'];
  }
  if(isset($_POST['location'])){
    $location = $_POST['location'];
  }

   
   $database = new NewsCasterDatabase();
  // //test if user has profile
   $userID = $_COOKIE['ID'];
   $query = "Select * from `userProfileInfo` where userID = " . $userID;
   $profileExists = $database->db_select($query);

   // echo 'test!!!!!!!!!!!!!!!!!!!!!!!';
   // echo $bio . $location;
   // echo $userID;
   // print_r($profileExists);
   if (empty($profileExists)){
    $query = 'Insert into `userProfileInfo` (userID, bio, location, profilePicPath) values ('. $userID . ',"' . $bio . '","' .  $location . '","' . $destination . '")';  
    $query = stripslashes($query); 
    $database->db_insert($query);
    //echo $query;
   }
  else{
    $query = 'Update `userProfileInfo` set bio = "'. $bio . '", location = "' . $location . '", profilePicPath = "' . $destination . '" where userID =' . $userID;  
    $query = stripslashes($query); 
    $database->db_insert($query);
    //echo $query;
  }
header ('Location: ./viewProfile.php');

  
?>
