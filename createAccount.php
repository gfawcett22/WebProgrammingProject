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
        <span>First Name</span>
        <input type="text" class="form-control" name="firstname" placeholder="First Name" />
        <br>
        <span>Last Name</span>
        <input type="text" class="form-control" name="lastname" placeholder="Last Name" />
        <br>
        <span>Email</span>
        <input type="email" class="form-control" name="email" placeholder="Email" required />
        <br>
        <span>Username</span>
        <input type="text" class="form-control" name="username" placeholder="Username" required />
        <br />
        <span>Password</span>
        <input type="password" class="form-control" name="password" placeholder="Password" required />
        <br />
        <div class="btn-group" id="login">
            <button type="submit" class="btn btn-default">Create Account</button>
        </div>
    </form>
</div>

</body>

</html>