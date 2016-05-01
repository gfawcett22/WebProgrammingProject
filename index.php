<?php
    //make sure user cant just type index.html in url and get to page. has to have login cookie
     if (!(isset($_COOKIE['username']) && isset($_COOKIE['password']))){
         header("Location: login.php"); exit();
	 }
?>
<html>
<head>
    <title>News Caster 3000</title>
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
  <div class="newsFeedTimeline">
      <select id ="newsTimesSpan" onmousedown="this.value='';" onchange="myFeed(this.value);">
          <option value='1'>Daily</option>
          <option value='7'>Weekly</option>
          <option value='30'>Monthly</option>
      </select>
  </div>
<h1 id="newsTimeSpanHeader"></h1>
<div id="newsFeed">
    
</div>

</body>
</html>
