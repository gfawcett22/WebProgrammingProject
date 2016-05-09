<?php
 include_once('processAction.php');

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    $alert = processAction($action);
    echo $alert;
}
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
?>
<html>
<head>
    <title>View Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="./scripts/jquery-2.2.2.min.js"></script>
    <script src="./scripts/jquery-ui.min.js"></script>
    <script src="./scripts/bootstrap.min.js"></script>
    <script src="./newsfeed.js"></script>

    <link href="./styles/jquery-ui.min.css" rel="stylesheet" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./styles/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="./styles/index.css" rel="stylesheet"/>

</head>
<body>
    <?php include 'indexHeader.php'; ?>
    <div id='centeredDiv' class='container'>
    <div class='row'>
      <h2 class='title'><?php echo 'Hello, '. $_COOKIE['username'] . '!' ;?></h2>
    </div>
    <div class='row'>
      <img src="<?php include './accessors/getProfilePic.php'; ?>" id="profilePic"/>
    </div>
    <div class='row'>
        <div class='col-md-5'><span class='text'>Bio: </span></div>
        <div class="col-md-7"><span class="profileInfo"><?php include './accessors/getBio.php'; ?></span></div>
    </div>
    <div class='row'>
        <div class='col-md-5'><span class='text'>Location: </span></div>
        <div class="col-md-7"><span class="profileInfo"><?php include './accessors/getLocation.php'; ?></span></div>
    </div>
        <br>
        <br>
        <div class="row text">Interests: </div>
        <div>
            <?php include './accessors/getPreferences.php'; ?>
        </div>
</body>
</html>