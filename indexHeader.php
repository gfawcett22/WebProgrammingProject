
<nav id="navigationBar" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" id="header">News Caster 3000</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Top News
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Top Global News</a>
                        <a href="#">Top National News</a>
                        <a href="#">Top Local News</a>

                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Money</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Global Markets</a></li>
                    <li><a href="#">National Markets</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Personal Finance</a></li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Politics</a>
                <ul class="dropdown-menu">
                    <li><a href="#">World Politics</a></li>
                    <li><a href="#">National Politics</a></li>
                    <li><a href="#">State Politics</a></li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sports</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Football</a>
                            <ul>
                                <li><a href="#">NFL</a></li>
                                <li><a href="#">NCAA</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Basketball</a>
                            <ul>
                                <li><a href="#">NBA</a></li>
                                <li><a href="#">NCAA</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Soccer</a>
                            <ul>
                                <li><a href="#">Global Soccer News</a></li>
                                <li><a href="#">National Soccer News</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Baseball</a>
                            <ul>
                                <li><a href="#">MLB</a></li>
                                <li><a href="#">NCAA</a></li>
                            </ul>
                        </li>
                    </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Technology</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">News</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
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
