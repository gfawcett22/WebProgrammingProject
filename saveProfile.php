<?php
  //include_once 'NewsCasterDatabase.php';

  function saveFileGetPath(){
    $directory = './pictures/';
    $destination = $directory . .basename($_FILES['profilePic']['name']);
    $imageFileType = pathinfo($destination , PATHINFO_EXTENSION);
    $uploadOk = 1;
    //make sure its image file
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
    {
    echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
    $uploadOk = 0;
    }
    //if no errors
    if ($uploadOk ==1)
    {
      //if successfully stored
      if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $destination)) 
      {
        //return path for easy storing
        return $destination;
      }
    }
    return '';
  }

  //test if user selected a file, entered bio and location
  if (file_exists($_FILES['profilePic']['tmp_name']) || is_uploaded_file($_FILES['profilePic']['tmp_name'])){
    $profilePicPath = saveFileGetPath();
  }
  if (isset($_POST['bio'])){
    $bio = $_POST['bio'];
  }
  if(isset($_POST['location'])){
    $location = $_POST['location'];
  }
   echo $profilePicPath . ' ' . $bio . ' ' . $location;
  // $database = new NewsCasterDatabase();
  // //test if user has profile
  // $userID = $COOKIE['ID'];
  // $query = "Select bio, location, profilePicPath from `userProfileInfo` where userID = " . $userID;
  // $profileExists = $database->db_select($query);
  // if (is_null($profileExists){
  //   $query = 'insert into `userProfileInfo` (bio, location, profilePicPath) values("'. $bio . '","' .  $location . '","' . $profilePicPath . '")';
  //   $databse->db_select($query);
  // }
  // else{
  //   $query = 'Update `userProfileInfo` set bio = "'. $bio . '", location = "' . $location . '", profilePicPath = "' . $profilePicPath . '" where userID =' . $userID;
  //   $database->db_select($query);
  // }
//header ('Location: ./viewProfile.php');

  
?>
