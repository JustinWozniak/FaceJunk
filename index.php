<?php

$con = mysqli_connect("localhost", "root", "", "social");
if(mysqli_connect_errno())  {
    echo"Failed to connect".mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES(NULL,'Justin') ");
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
    <title>FaceJunk</title>
    <meta name="description" content="" />
  </head>
  <body></body>
</html>
