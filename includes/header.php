<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Notification.php");

if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  // echo  $userLoggedIn;
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
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="description" content="" />
  <title>Starfukkers!!!!!~</title>

  <!-- 
  Javascript includes.... -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="assets/js/bootbox.min.js"></script>
  <script src="./assets/js/bootstrap.js"></script>
  <script src="assets/js/gonzo.js"></script>
  <script src="assets/js/jcrop_bits.js"></script>
  <script src="assets/js/jquery.jcrop.js"></script>


  <!-- css things -->
  <script src="https://kit.fontawesome.com/7e196638a2.js"></script>
  <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"">
  <link rel=" stylesheet" type="text/css" href="./assets/css/style.css"">
  </head>

<div class=" top_bar">
  <img src="assets/images/logos/starfukkers2.png" alt="logo" class="headerLogo">
  </a>

  <div class="search">

    <form action="search.php" method="GET" name="search_form"  >
      <input type="text" onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn; ?>')" name="q" placeholder="Search for other freaks..." autocomplete="off" id="search_text_input">

      <div class="button_holder">
        <img src="assets/images/icons/searchicon.jpg" class='searchicon' title='Search'>
      </div>

    </form>

    <div class="search_results">
    </div>

    <div class="search_results_footer_empty">
    </div>
  </div>
  <nav>
    <?php
    //Unread messages 
    $messages = new Message($con, $userLoggedIn);
    $num_messages = $messages->getUnreadNumber();

    //Unread notifications 
    $notifications = new Notification($con, $userLoggedIn);
    $num_notifications = $notifications->getUnreadNumber();

    //Unread notifications 
    $user_obj = new User($con, $userLoggedIn);
    $num_requests = $user_obj->getNumberOfFriendRequests();
    ?>
    <a href="<?php echo $userLoggedIn; ?>" title='My Profile'>
      <?php echo $user['first_name']; ?>
    </a>
    <!-- "title" is passed to Gonzo.js so it knows wich dropdown to show -->
    <a href="index.php"><i class="fas fa-meh-rolling-eyes" title='Newsfeed'></i> </a>
    <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')">
      <i class="fas fa-skull-crossbones" title='Notifications'></i>
      <?php
      if ($num_notifications > 0)
        echo '<span class="notification_badge" id="unread_notification">' . $num_notifications . '</span>';
      ?>
    </a>
    <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')">
      <i class="fas fa-bullhorn" title="Messages"></i>
      <?php
      if ($num_messages > 0)
        echo '<span class="notification_badge" id="unread_message">' . $num_messages . '</span>';
      ?>
    </a>
    <a href="requests.php">
      <i class="fas fa-frog" title="Friend Requests"></i>
      <?php
      if ($num_requests > 0)
        echo '<span class="notification_badge" id="unread_requests">' . $num_requests . '</span>';
      ?>
    </a>
    <a href="#">
      <a href="assets/bathroomwall/chatapp.php"><i class="fas fa-restroom" title='Bathroom Wall'></i> </a>
      <a href="settings.php"><i class="fas fa-hat-wizard" title='Settings'></i> </a>
      <a href="includes/handlers/logout.php"><i class="fas fa-heart-broken" title='Log Out'></i> </a>
  </nav>

  <div class="dropdown_data_window" style="height:0px; border:none;"></div>
  <input type="hidden" id="dropdown_data_type" value="">
  </div>

  <script>
    var userLoggedIn = '<?php echo $userLoggedIn; ?>';

    $(document).ready(function() {

      $('.dropdown_data_window').scroll(function() {
        let inner_height = $('.dropdown_data_window').innerHeight(); //Div containing data
        let scroll_top = $('.dropdown_data_window').scrollTop();
        let page = $('.dropdown_data_window').find('.nextPageDropdownData').val();
        let noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

        if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {

          let pageName; //Holds name of page to send ajax request to
          let type = $('#dropdown_data_type').val();


          if (type == 'notification')
            pageName = "ajax_load_notifications.php";
          else if (type = 'message')
            pageName = "ajax_load_messages.php"


          let ajaxReq = $.ajax({
            url: "includes/handlers/" + pageName,
            type: "POST",
            data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
            cache: false,

            success: function(response) {
              $('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage 
              $('.dropdown_data_window').find('.noMoreDropdownData').remove(); //Removes current .nextpage 


              $('.dropdown_data_window').append(response);
            }
          });

        } //End if 

        return false;

      }); //End (window).scroll(function())


    });
  </script>


  <div class="wrapper">