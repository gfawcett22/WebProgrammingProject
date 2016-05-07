<?php
include_once 'NewsCasterDatabase.php';

$userID = $_COOKIE['ID'];

$database = new NewsCasterDatabase();
$query = 'select money, politics, sports, technology from `userProfileInfo` where userID =' . $userID;
$result = $database->db_select($query);
//if on edit page. used to load checkboxes that aren't disabled
if(isset($action) && $action == 'edit'){
    if (empty($result)) {
        echo '<div class="row"><span class="text col-md-2">Money: </span><input type="checkbox" class="col-md-1" name="money" id="money" ><div class="col-md-9"></div></div>';
        echo '<div class="row"><span class="text col-md-2">Politics: </span><input type="checkbox" class="col-md-1" name="politics" id="politics" ><div class="col-md-9"></div></div>';
        echo '<div class="row"><span class="text col-md-2">Sports: </span><input type="checkbox" class="col-md-1" name="sports" id="sports" ><div class="col-md-9"></div></div>';
        echo '<div class="row"><span class="text col-md-2">Technology: </span><input type="checkbox" class="col-md-1" name="technology" id="technology" ><div class="col-md-9"></div></div>';
    } else {
        if ($result[0]['money'] == 1)
            echo '<div class="row"><span class="text col-md-2">Money: </span><input type="checkbox" class="col-md-1" name="money" id="money"  checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Money: </span><input type="checkbox" class="col-md-1" name="money" id="money" ><div class="col-md-9"></div></div>';
        if ($result[0]['politics'] == 1)
            echo '<div class="row"><span class="text col-md-2">Politics: </span><input type="checkbox" class="col-md-1" name="politics" id="politics"  checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Politics: </span><input type="checkbox" class="col-md-1" name="politics" id="politics" ><div class="col-md-9"></div></div>';
        if ($result[0]['sports'] == 1)
            echo '<div class="row"><span class="text col-md-2">Sports: </span><input type="checkbox" class="col-md-1" name="sports" id="sports"  checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Sports: </span><input type="checkbox" class="col-md-1" name="sports" id="sports" ><div class="col-md-9"></div></div>';
        if ($result[0]['technology'] == 1)
            echo '<div class="row"><span class="text col-md-2">Technology: </span><input type="checkbox" class="col-md-1" name="technology" id="technology"  checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Technology: </span><input type="checkbox" class="col-md-1" name="technology" id="technology" ><div class="col-md-9"></div></div>';
    }

}else {
    if (empty($result)) {
        echo '<div class="row"><span class="text col-md-2">Money: </span><input type="checkbox" class="col-md-1" name="money" id="money" disabled><div class="col-md-9"></div></div>';
        echo '<div class="row"><span class="text col-md-2">Politics: </span><input type="checkbox" class="col-md-1" name="politics" id="politics" disabled><div class="col-md-9"></div></div>';
        echo '<div class="row"><span class="text col-md-2">Sports: </span><input type="checkbox" class="col-md-1" name="sports" id="sports" disabled><div class="col-md-9"></div></div>';
        echo '<div class="row"><span class="text col-md-2">Technology: </span><input type="checkbox" class="col-md-1" name="technology" id="technology" disabled><div class="col-md-9"></div></div>';
    } else {
        if ($result[0]['money'] == 1)
            echo '<div class="row"><span class="text col-md-2">Money: </span><input type="checkbox" class="col-md-1" name="money" id="money" disabled checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Money: </span><input type="checkbox" class="col-md-1" name="money" id="money" disabled><div class="col-md-9"></div></div>';
        if ($result[0]['politics'] == 1)
            echo '<div class="row"><span class="text col-md-2">Politics: </span><input type="checkbox" class="col-md-1" name="politics" id="politics" disabled checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Politics: </span><input type="checkbox" class="col-md-1" name="politics" id="politics" disabled><div class="col-md-9"></div></div>';
        if ($result[0]['sports'] == 1)
            echo '<div class="row"><span class="text col-md-2">Sports: </span><input type="checkbox" class="col-md-1" name="sports" id="sports" disabled checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Sports: </span><input type="checkbox" class="col-md-1" name="sports" id="sports" disabled><div class="col-md-9"></div></div>';
        if ($result[0]['technology'] == 1)
            echo '<div class="row"><span class="text col-md-2">Technology: </span><input type="checkbox" class="col-md-1" name="technology" id="technology" disabled checked><div class="col-md-9"></div></div>';
        else
            echo '<div class="row"><span class="text col-md-2">Technology: </span><input type="checkbox" class="col-md-1" name="technology" id="technology" disabled><div class="col-md-9"></div></div>';

    }
}
?>