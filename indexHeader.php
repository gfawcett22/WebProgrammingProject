
<nav id="navigationBar" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" id="header">News Caster 3000</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="index.php" class="navbar-brand" >
                    Home
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a onclick="getMoneyFeed(1);" class="navbar-brand" id="money">
                    Money
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a onclick="getPoliticsFeed(1);" class="navbar-brand">
                    Politics
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a onclick="getSportsFeed(1);" class="navbar-brand">
                    Sports
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a onclick="getTechnologyFeed(1);" class="navbar-brand">
                    Technology
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello <?php if (isset($_COOKIE['username'])){echo $_COOKIE['username'];} else {echo 'User';} ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="viewProfile.php">View Profile</a></li>
              <li><a href="editProfile.php">Edit Profile</a></li>
              <li><a href="logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
    </div>
</nav>
