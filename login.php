<?php
require_once('processAction.php');

if(isset($_GET['action'])){
	$action = $_GET['action'];
	$alert = processAction($action);
	echo $alert;
}

?>

<html>
<head>
    <title>News Caster 3000</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/login.css" rel="stylesheet"/>
    <script src="./scripts/bootstrap.min.js"></script>
</head>
<body>
<div id="mainDiv">
    <div id="header">
        <a href="login.php">
            <label id="title">News Caster 3000</label>
        </a>
    </div>
    <br/>
    <br/>
    <form method="post" action="processLogin.php" method="post">
        <span>Username</span>
        <input type="text" class="form-control" name="username" placeholder="Username" />
        <br />
        <span>Password</span>
        <input type="password" class="form-control" name="password" placeholder="Password" />
        <br />
        <span>Remember me?</span>
        <input type="checkbox" name="rememberme" value="1">
        <br>
        <div class="btn-group" id="login">
            <button type="submit" class="btn btn-default"><a href="index.php">Login</a></button>
        </div>
        <br>
        <br>
        <br>
        <div class="btn-group" id="create">
            <label style="font-family:Arial">Don't have an account?</label><br>
            <button type="button" id="createBtn" class="btn btn-default"><a href="createAccount.php">Create Account</a></button>
        </div>
    </form>
</div>

</body>

</html>