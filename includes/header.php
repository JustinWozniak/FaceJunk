<?php
require 'config/config.php';

if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  echo  $userLoggedIn;
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
} else {
  header("Location: register.php");
}

?>


<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta name="description" content="" />
  <title>Welcome to FaceJunk!!!!~</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.js"></script>

  <!-- css things -->
  <script src="https://kit.fontawesome.com/7e196638a2.js"></script>
  <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"">
    <link rel=" stylesheet" type="text/css" href="./assets/css/style.css"">
  </head>
  <body>
<div class=" top_bar">
  <img src="assets/images/logos/facejunk logo.jpg" alt="logo" class="headerLogo">
  </a>

  <nav>
    <a href="<?php echo $userLoggedIn; ?>">
      <?php echo $user['first_name']; ?>
    </a>
    <a href="#"><i class="fas fa-meh-rolling-eyes" title='Home'></i> </a>
    <a href="#"><i class="fas fa-bullhorn" title='Notifications'></i> </a>
    <a href="#"><i class="fas fa-skull-crossbones" title='Messages'></i> </a>
    <a href="#"><i class="fas fa-frog" title='Users'></i> </a>
    <a href="assets/bathroomwall/chatapp.php"><i class="fas fa-restroom" title='Bathroom Wall'></i> </a>
    <a href="#"><i class="fas fa-hat-wizard" title='Settings'></i> </a>
  </nav>
  </div>
  </div>


  </body>

</html>