<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'NewsCasterDatabase.php';
//test if user entered bio and location and preferences
if (isset($_POST['bio'])){
    $bio = $_POST['bio'];
}
if(isset($_POST['location'])){
    $location = $_POST['location'];
}
if(isset($_POST['money'])){
    $money = 1;
}else{
    $money=0;
}

if(isset($_POST['politics'])){
    $politics = 1;
}else{
    $politics = 0;
}
if(isset($_POST['sports'])){
    $sports = 1;
}else{
    $sports = 0;
}
if(isset($_POST['technology'])){
    $technology = 1;
}else{
    $technology = 0;
}
print_r($_FILES['picUpload']['tmp_name']);
if (isset($_FILES['picUpload']['tmp_name']) && !empty($_FILES['picUpload']['tmp_name'])) {
    $fileToMove = $_FILES['picUpload']['tmp_name'];
    $destination = './pictures/' . $_FILES['picUpload']['name'];
    $imageFileType = pathinfo($destination , PATHINFO_EXTENSION);
    if (move_uploaded_file($fileToMove, $destination)) {
        //if file uploaded successfully, put values in database
        $database = new NewsCasterDatabase();
        //test if user has profile
        $userID = $_COOKIE['ID'];
        $query = "Select * from `userProfileInfo` where userID = " . $userID;
        $profileExists = $database->db_select($query);
        if (empty($profileExists)){
            $query = 'Insert into `userProfileInfo` (userID, bio, location, profilePicPath, money, politics, sports, technology) values ('. $userID . ',"' . $bio . '","' .  $location . '","' . $destination . '",' . $money . ',' . $politics . ',' . $sports . ',' . $technology . ');';
            $query = stripslashes($query);
            $database->db_insert($query);
            //echo $query;
        }
        else{
            $query = 'Update `userProfileInfo` set bio = "'. $bio . '", location = "' . $location . '", profilePicPath = "' . $destination . '", money = ' . $money . ', politics = ' . $politics . ', sports = ' . $sports . ', technology = ' . $technology .  ' where userID = ' . $userID;
            $query = stripslashes($query);
            $database->db_insert($query);
            //echo $query;
        }
    } else {
        //file upload wasn't successful, go back to view profile page with file upload error
        header('Location: ./viewProfile.php?action=filefailed');
    }
}else {
    $database = new NewsCasterDatabase();
//test if user has profile
    $userID = $_COOKIE['ID'];
    $query = "Select * from `userProfileInfo` where userID = " . $userID;
    $profileExists = $database->db_select($query);

    if (empty($profileExists)) {
        $query = 'Insert into `userProfileInfo` (userID, bio, location, money, politics, sports, technology) values (' . $userID . ',"' . $bio . '","' . $location . '","' . $destination .  ',' . $money . ',' . $politics . ',' . $sports . ',' . $technology . ');';
        $query = stripslashes($query);
        $database->db_insert($query);
        //echo $query;
    } else {
        $query = 'Update `userProfileInfo` set bio = "' . $bio . '", location = "' . $location .  '", money = ' . $money . ', politics = ' . $politics . ', sports = ' . $sports . ', technology = ' . $technology . ' where userID = ' . $userID;
        $query = stripslashes($query);
        $database->db_insert($query);
        //echo $query;
    }
}

header ('Location: ./viewProfile.php');
?>
