<?php

ob_start();//turns on object buffering
//session storgae to save letters typed into form
session_start();

$timeZone = date_default_timezone_set("America/Toronto");
$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable

if (mysqli_connect_errno()) {
  echo "Failed to connect: " . mysqli_connect_errno();
}



?>