<?php
include_once('processAction.php');
session_start();

if(isset($_GET['action'])){
	$action = $_GET['action'];
	$alert = processAction($action);
	echo $alert;
}

if(isset($_SESSION['inputUsername']) && isset($_SESSION['inputEmail']) && isset($_SESSION['inputFirstName']) && isset($_SESSION['inputLastName'])){
    $inputUserName = $_SESSION['inputUsername'];
    $inputEmail = $_SESSION['inputEmail'];
    $inputFirstName = $_SESSION['inputFirstName'];
    $inputLastName = $_SESSION['inputLastName'];
}else{
    $inputUserName = "";
    $inputEmail = "";
    $inputFirstName = "";
    $inputLastName = "";
}
?>


<html>
<head>
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/login.css" rel="stylesheet"/>
    <script src="./scripts/bootstrap.min.js"></script>
</head>
<body>
<div id="mainDiv">
    <div id="header">
        <a href="createAccount.php">
            <label id="title">Create Account</label>
        </a>
    </div>
    <br/>
    <br/>
    <form method="post" action="processCreateAccount.php" method="post" >
        <span>First Name:</span>
        <input type="text" class="form-control" name="firstname" placeholder="First Name" value = "<?php echo $inputFirstName; ?>" />
        <br>
        <span>Last Name:</span>
        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value = "<?php echo $inputLastName; ?>" />
        <br>
        <span>Email:</span>
        <input type="email" class="form-control" name="email" placeholder="Email" value = "<?php echo $inputEmail; ?>" required />
        <br>
        <span>Username:</span>
        <input type="text" class="form-control" name="username" placeholder="Username" value = "<?php echo $inputUserName; ?>" required />
        <br />
        <span>Password:</span>
        <input type="password" class="form-control" name="password" placeholder="Password" required />
        <br />
        <div class="btn-group" id="login">
            <button type="submit" class="btn btn-default">Create Account</button>
        </div>
    </form>
</div>

</body>

</html>
