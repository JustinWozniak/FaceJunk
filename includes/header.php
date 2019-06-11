<?php  
require 'config/config.php';

if(isset($_SESSION["username"]))    {
    $userLoggedIn = $_SESSION["username"];
}   else    {
    header("Location:register.php");
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <meta name="description" content="" />
    <title>Welcome to FaceJunk!!!!~</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"">
  </head>
  <body></body>
</html>
