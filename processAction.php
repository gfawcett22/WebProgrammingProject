<?php
function processAction($action){
  switch ($action){
    case "error":
      $statement = '<div class="alert alert-info">
        Sorry, there has been an error in your login.  Please try again!
        </div>';
		return $statement;
        break;
    case "emailtaken":
      $statement = '<div class="alert alert-info">
              Sorry, the email you entered was already taken.  Please try again!
            </div>';
			return $statement;
            break;
    case "usernametaken":
      $statement = '<div class="alert alert-info">
              Sorry, the username you entered was already taken.  Please try again!
              </div>';
              return $statement;
			break;
    case "loginfailed":
      $statement = '<div class="alert alert-info">
              The login you entered is not correct.  Please try again!
              </div>';
              return $statement;
			break;
    case "filefailed":
      $statement = '<div class="alert alert-info">
              The file you tried uploading failed to save.  Please try again!
              </div>';
              return $statement;
    default:
          break;
  }
}

 ?>
