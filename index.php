<?php
    //make sure user cant just type index.html in url and get to page. has to have login cookie
  //   if (!(isset($_COOKIE['username']) && isset($_COOKIE['password']))){
  //       header("Location: login.php"); exit();
	// }
?>
<html>
<head>
    <title>News Caster 3000</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="./scripts/jquery-2.2.2.min.js"></script>
    <script src="./scripts/jquery-ui.min.js"></script>
    <script src="./scripts/bootstrap.min.js"></script>

    <link href="./styles/jquery-ui.min.css" rel="stylesheet" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./styles/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="./styles/index.css" rel="stylesheet"/>

</head>
<body>

        <nav id="navigationBar" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php" id="header">News Caster 3000</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello <?php if (isset($_COOKIE['username'])){echo $_COOKIE['username'];} else {echo 'User';} ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="editProfile.php">Edit Profile</a></li>
                      <li><a href="logout.php">Log Out</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
        </nav>

</body>
</html>
