<?php
include("includes/header.php");

$message_obj = new Message($con, $userLoggedIn);

if (isset($_GET['u']))
$userTo = $_GET['u'];
else {
    $userTo = $message_obj->getMostRecentUser();
    if ($userTo == false)   {
        $userTo = 'new';
    }
}


?>