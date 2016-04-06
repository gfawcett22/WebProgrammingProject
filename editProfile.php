<?php

?>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="./scripts/jquery-2.2.2.min.js"></script>
    <script src="./scripts/jquery-ui.min.js"></script>
    <script src="./scripts/bootstrap.min.js"></script>

    <link href="./styles/jquery-ui.min.css" rel="stylesheet" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./styles/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="./styles/index.css" rel="stylesheet"/>
    <script>
      $(document).ready(function(){
        updateCountdown();
        $('#bio').change(updateCountdown);
        $('#bio').keyup(updateCountdown);
      });
      function updateCountdown() {
        var remaining = 500 - $('#bio').val().length;
        $('.counter').text('(' + remaining + ')');
      }
      
    </script>
</head>
<body>
<?php include 'indexHeader.php'; ?>
<form id='profile' method="post" enctype="multipart/form-data">
  <div id='centeredDiv' class='container'>
    <div class='row'>
      <h2 class='title'>Edit Profile</h2>
    </div>
    <div class='row'>
      <?php include 'getProfilePic.php'; ?>
    </div>
    <div class='row'>
      <div class='small'>
        <span class='text'>Select an image for your profile: </span>
      </div>
      <div class='large'>
        <input type='file' id='picUpload' name='picUpload'>
      </div>
    </div>
    <div class='row'>
      <div class='small'>
        <span class='text' >Tell us about yourself: <sub class='counter'></sub> </span>
      </div>
      <div class='large'>
        <textarea id='bio' class='data' name='bio' form='profile' rows='3' maxlength="500"></textarea>
      </div>
    </div>
    <div class='row'>
      <div class='small'>
        <span class='text'>Location: </span>
      </div>
      <div class='large'>
        <input type='text' class='data' name='location' id='location' maxlength="100" />
      </div>
    </div>
    <div class='row'>
      <input type='submit' id='editSubmit' name='editSubmit' value="Save" class='btn btn-primary'>
    </div>
  </div>
</form>
</body>
</html>
