<?php
include("includes/header.php");
// session_destroy();
?>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta name="description" content="" />

</head>

<body class="mainview">
  <div class="user_details column">
    <a href="#"><img src="<?php echo $user['profile_pic'];  ?>"></a>
    <div class='user_details_left_right'>
    <a href="#">
    <?php echo $user['first_name'] . " " . ['last_name']; ?>
    </a>
    <br>
    <?php
echo "Posts: ".$user['num_posts']."<br>";
echo "Likes: ".$user['num_likes'];
?>
  </div>
  </div>
  <script src="./assets/js/wallpaper.js"></script>


  </div>
</body>

</html>


</div>