<?php
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");
// session_destroy();


if(isset($_POST['post'])) {
  $post = new Post ($con, $userLoggedIn);
  $post->submitPost($_POST['post_text'], 'none');
}
?>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta name="description" content="" />

</head>

<body class="mainview">
<script src="./assets/js/wallpaper.js"></script>
  <div class="user_details column">
    <a href="<?php echo $userLoggedIn; ?>"><img src="<?php echo $user['profile_pic'];  ?>"></a>
    <div class='user_details_left_right'>
    <a href="<?php echo $userLoggedIn; ?>">
    <?php echo $user['first_name']; ?>
    </a>
    <br>
    <?php
echo "Posts: ".$user['num_posts']."<br>";
echo "Likes: ".$user['num_likes'];
?>
  </div>
  </div>
<div class='main_column column'>
<form class='post_form' action="index.php" method=POST>
  <textarea name='post_text' id='post_text' placeholder="Whatta ya wanna say yo!!!?"></textarea>
  <input type='submit' name='post' id="post_button" value="post">
  <hr>

</form>

<?php
  $post = new Post($con, $userLoggedIn);
  $post->loadPostsFriends();

?>
</div>


  </div>
</body>

</html>


</div>