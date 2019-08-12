<?php
include("includes/header.php");
include("includes/form_handlers/settings_handler.php");
?>
 <body class="mainview">
 <script src="./assets/js/wallpaper.js"></script>
<div class="main_column column">

	<h4>Account Settings</h4>
	<?php
	echo "<img src='" . $user['profile_pic'] . "' id='small_profile_pics'>";
	?>
	<br>
	<a href="upload.php" class="accountSettingText">Upload new profile picture</a> <br><br><br>

	Modify the values and click 'Update Details'

	<?php
	$user_data_query = mysqli_query($con, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
	$row = mysqli_fetch_array($user_data_query);

	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	?>

	<form action="settings.php" method="POST">
		First Name: <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
		Last Name: <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
		Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
		<br><br>
		<?php echo $message; ?>

		<input type="submit" name="update_details" id="save_details" value="Update Details"><br>
	</form>

	<h4>Change Password</h4>
	<form action="settings.php" method="POST">
		Old Password: <input type="password" name="old_password"><br>
		New Password: <input type="password" name="new_password_1"><br>
		New Password Again: <input type="password" name="new_password_2"><br>
		<input type="submit" name="update_password" id="save_details" value="Update Password"><br>
	</form>
	<br><br>
	<?php echo $password_message; ?>
<br><br>
<h4>Close Account</h4>
<form action="close_account.php">
    <input type="submit" value="CLOSE ACCOUNT" />
</form>
</div>
 </body>