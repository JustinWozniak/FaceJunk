<?php
//-------------------THE FOLLOWING IS EMAIL SENT WHEN YOU SIGN UP
// require 'register_handler.php';
// require 'config/config.php';


$email = mysqli_query($con, "SELECT * FROM users WHERE email='$em'");
$emailAddress = mysqli_fetch_array($email);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\composer\vendor\autoload.php';

	$mail = new PHPMailer(TRUE);
	
	try {
	
		$mail->setFrom('rockabillyriot@hotmail.com', 'Justin Wozniak');
		$mail->addAddress($emailAddress['email'], 'Emperor');
		$mail->Subject = 'FaceJunk all over the place!~';
	
		$mail->isHTML(TRUE);
		$mail->Body = '<html>Welcome to <strong>FaceJunk!!</strong>. Get ready! Its gunna get messy!<br>
		I started this thing in June 2019 and its been growing ever since!!!!!<br>
		Anything goes so watch out!<br>
		Apon sign in you will be given a random picture for your profile pic, and if your bored with the background, just hit refresh...<br>
		Theres 40 random ones that will be shown.</html>';
		$mail->AltBody = 'There is a great disturbance in the Force.';
		$mail->addAttachment('C:\xampp\htdocs\tests\facejunk\assets\images\logos\facejunk logo.jpg', 'Your a mess...');
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls';
		$mail->Username = 'thedrunkfox69@gmail.com';
		$mail->Password = 'thecomet';
		$mail->Port = 587;
	
		/* Enable SMTP debug output. */
		$mail->SMTPDebug = 0;
	
        $mail->send();
        // header($_SERVER['PHP_SELF']);
	} catch (Exception $e) {
		// echo $e->errorMessage();
	} catch (\Exception $e) {
		// echo $e->getMessage();
	}
	
	?>


<html class="mainview">
<head>
	<title>Welcome to FaceJunk!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="./assets/js/wallpaper.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="./assets/js/register.js"></script>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body>
    Signup successful!
  </body>
</html>


</div>