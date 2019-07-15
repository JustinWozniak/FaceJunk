$(document).ready(function() {
  //Button for profile post
  $("#submit_profile_post").click(function() {
    $.ajax({
      type: "POST",
      url: "includes/handlers/ajax_submit_profile_post.php",
      data: $("form.profile_post").serialize(),
      success: function(msg) {
        $("#post_form").modal("hide");
        location.reload();
      },
      error: function() {
        alert("Failure");
      }
    });
  });
});

//looks for users in searchbar in messages page
function getUsers(value, user) {
  $.post(
    "includes/handlers/ajax_friend_search.php",
    { query: value, userLoggedIn: user },
    function(data) {
      $(".results").html(data);
    }
  );
}

function getDropdownData(user, type) {
  if ($(".dropdown_data_window").css("height") == "0px") {
    let pageName;

    if (type == "notification") {
    } else if (type == "message") {
      pageName = "ajax_load_messages.php";
      $("span").remove("#unread_message");
    }

    let ajaxreq = $.ajax({
      url: "includes/handlers/" + pageName,
      type: "POST",
      data: "page=1&userLoggedIn=" + user,
      cache: false,

      success: function(response) {
        $(".dropdown_data_window").html(response);
        $(".dropdown_data_window").css({
          padding: "10px",
          height: "280px",
          border: "3px solid black"
        });
        $("#dropdown_data_type").val(type);
      }
    });
  } else {
    $(".dropdown_data_window").html("");
    $(".dropdown_data_window").css({
      padding: "0px",
      height: "0px",
      border: "none"
    });
  }
}
