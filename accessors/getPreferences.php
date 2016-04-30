<?php
include_once 'NewsCasterDatabase.php';

$userID = $_COOKIE['ID'];

$database = new NewsCasterDatabase();
$query = 'select news, money, politics, sports, technology from `userProfileInfo` where userID =' . $userID;
$result = $database->db_select($query);
if(empty($result)){ ?>
    <div class="row">
      <span class="text col-md-2">News: </span>
      <input type="checkbox" class="col-md-1" name="news" id="news">
      <div class="col-md-9"></div>
    </div>
    <div class="row">
      <span class="text col-md-2">Money: </span>
      <input type="checkbox" class="col-md-1" name="money" id="money">
      <div class="col-md-9"></div>
    </div>
    <div class="row">
      <span class="text col-md-2">Politics: </span>
      <input type="checkbox" class="col-md-1" name="politics" id="politics">
      <div class="col-md-9"></div>
    </div>
    <div class="row">
      <span class="text col-md-2">Sports: </span>
      <input type="checkbox" class="col-md-1" name="sports" id="sports">
      <div class="col-md-9"></div>
    </div>
    <div class="row">
      <span class="text col-md-2">Technology: </span>
      <input type="checkbox" class="col-md-1" name="technology" id="technology">
      <div class="col-md-9"></div>
    </div>
  <?php  }
else{ ?>
<div class="row">
    <span class="text col-md-2">News: </span>
    <input type="checkbox" class="col-md-1" name="news" id="news">
    <div class="col-md-9"></div>
</div>
<div class="row">
    <span class="text col-md-2">Money: </span>
    <input type="checkbox" class="col-md-1" name="money" id="money" disabled checked>
    <div class="col-md-9"></div>
</div>
<div class="row">
    <span class="text col-md-2">Politics: </span>
    <input type="checkbox" class="col-md-1" name="politics" id="politics">
    <div class="col-md-9"></div>
</div>
<div class="row">
    <span class="text col-md-2">Sports: </span>
    <input type="checkbox" class="col-md-1" name="sports" id="sports">
    <div class="col-md-9"></div>
</div>
<div class="row">
    <span class="text col-md-2">Technology: </span>
    <input type="checkbox" class="col-md-1" name="technology" id="technology">
    <div class="col-md-9"></div>
</div>
<?php } ?>